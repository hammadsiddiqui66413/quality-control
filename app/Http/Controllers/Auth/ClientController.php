<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terminal;
use App\Models\Client;
use App\Models\Subscription;
use App\Models\Report;
use App\Models\Job;
use App\Helpers\Helper;

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
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    public function terminals()
    {
        $terminals = Terminal::where('client_id', auth()->user()->id)->get();
        $i = 1;
        return view('clients.terminal', compact('terminals', 'i'));
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

    public function jobs()
    {
        $jobs = Job::where('client_id', auth()->user()->id)->get();
        $i = 1;
        return view('clients.jobs', compact('jobs', 'i'));
    }

    public function reports($id)
    {
        $reports = Report::where('job_id', $id)->get();
        $i = 1;
        return view('clients.reports', compact('reports', 'i'));
    }
}