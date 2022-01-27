<?php
namespace App\Http\Controllers\Auth;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Terminal;
use App\Models\Client;
use App\Models\Subscription;
use App\Models\Report;
use App\Models\Job;
use App\Models\Plan;
use App\Helpers\Helper;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        $client = Client::where('id', auth()->user()->id)->first();
        $jobCount = count($client->jobs);
        $terminals = $client->terminals;
        $terminalCount = count($client->terminals);
        $amountSpent = 0;
        for($i=0; $i<$terminalCount; $i++)
        {
            $planPrice[$i] = $terminals[$i]->plan->amount;
            $amountSpent += $planPrice[$i];
        }
        $vat = $amountSpent*5/100;
        $discount = $amountSpent*0/100;
        $grandTotal = $amountSpent+$vat-$discount;

        return view('clients.index', compact('client', 'terminals', 'terminalCount', 'amountSpent', 'jobCount', 'grandTotal'));
    }

    public function terminals()
    {
        $terminals = Terminal::where('client_id', auth()->user()->id)->get();
        $i = 1;
        return view('clients.terminal', compact('terminals', 'i'));
    }

    public function addTerminal()
    {
        $plans = Plan::all();
        return view('clients.createTerminal', compact('plans'));
    }

    public function storeTerminal(Request $request)
    {
        $client =  auth()->user();
        $count = Plan::whereIn('id', $request->plan_id)->count();
        $details = array();

        for($i=0; $i<$count; $i++)
        {
            $rand_password = Helper::rand_string(8);
            $terminal = new Terminal();
            $terminal->username = 'ctp';
            $terminal->password = Hash::make($rand_password);
            $terminal->client_id = $client->id;
            $terminal->plan_id = $request->plan_id[$i];
            $terminal->save();
            $terminal->username = 'ctp'.$client->id.$terminal->id;
            $terminal->update();

            $username[$i] = $terminal->username;
            $password[$i] = $rand_password;
            array_push($details, [
                'username' => isset($username[$i]) ? $username[$i] : null,
                'password' => isset($password[$i]) ? $password[$i] : null
            ]);

            // CREATE SUBSCRIPTION
            $subscription = new Subscription();
            $plan = Plan::where('id', $terminal->plan_id)->first();
            $plan->time == 'monthly' ? $subscription->end_date=Carbon::now()->addMonth() : $subscription->end_date=Carbon::now()->addYear();
            $subscription->start_date = Carbon::now();
            $subscription->terminal_id = $terminal->id;
            $subscription->client_id = $client->id;
            $subscription->plan_id = $terminal->plan_id;
            $subscription->save();
        }

        Mail::to($client->email)->send(new TestMail($details));
        return redirect()->route('client.terms');
    }

    public function invoice()
    {
        $invoiceNo = Helper::rand_number(14);
        $client = Client::where('id', auth()->user()->id)->first();
        $terminals = Terminal::where('client_id', auth()->user()->id)->get();
        $count = Terminal::where('client_id', auth()->user()->id)->get()->count();
        $a = 1;
        $grandTotal = 0;
        $subTotal = 0;

        for($i=0; $i<$count; $i++)
        {
            $amount[$i] = $terminals[$i]->plan->amount;
            $subTotal += $amount[$i];
        }
        $vat = $subTotal*5/100;
        $discount = $subTotal*0/100;
        $grandTotal = $subTotal+$vat-$discount;

        return view('clients.invoice', compact('terminals', 'grandTotal', 'a', 'invoiceNo', 'vat', 'discount', 'subTotal', 'client'));
    }

    public function invoicePdf()
    {
        $invoiceNo = Helper::rand_number(14);
        $client = Client::where('id', auth()->user()->id)->first();
        $terminals = Terminal::where('client_id', auth()->user()->id)->get();
        $count = Terminal::where('client_id', auth()->user()->id)->get()->count();
        $a = 1;
        $grandTotal = 0;
        $subTotal = 0;

        for($i=0; $i<$count; $i++)
        {
            $amount[$i] = $terminals[$i]->plan->amount;
            $subTotal += $amount[$i];
        }
        $vat = $subTotal*5/100;
        $discount = $subTotal*0/100;
        $grandTotal = $subTotal+$vat-$discount;

        $pdf = PDF::loadView('clients.invoicePdf', compact('terminals', 'grandTotal', 'a', 'invoiceNo', 'vat', 'discount', 'subTotal', 'client'));
        return $pdf->stream();
    }

    public function jobs()
    {
        $jobs = Job::where('client_id', auth()->user()->id)->get();
        $i = 1;

        return view('clients.jobs', compact('jobs', 'i'));
    }

    public function reports($id)
    {
        $client = Client::where('id', auth()->user()->id)->first();
        $job = Job::where('id', $id)->first();
        $terminal = $job->terminal;
        $reports = Report::where('job_id', $id)->get();
        $i = 1;

        $view = view('clients.reports', compact('reports', 'i','client','terminal','job'));

        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = $pdf->loadHTML($view);
        return $pdf->stream();
    }
}
