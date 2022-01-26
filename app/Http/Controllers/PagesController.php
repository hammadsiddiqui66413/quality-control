<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Test;
use App\Models\User;
use App\Models\Client;
use App\Models\Terminal;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index()
    {
        $mPlans = Plan::where('time', 'monthly')->take(3)->get();
        $yPlans = Plan::where('time', 'yearly')->take(3)->get();

        return view('pages.index', compact('mPlans', 'yPlans'));
    }

    public function plans()
    {
        $mPlans = Plan::where('time', 'monthly')->get();
        $yPlans = Plan::where('time', 'yearly')->get();

        return view('pages.plans',compact('mPlans', 'yPlans'));
    }
    
    public function planDetail($id)
    {
        $plan = Plan::findOrFail($id);
        return view('pages.planDetail', compact('plan'));
    }

    public function getAmountByPlan(Request $request)
    {
        $plan = Plan::where('id', $request->id)->first();
        $amount = $plan->amount;

        return response()->json(['status'=>'200', 'amount'=>$amount]);
    }

    public function regDetails(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:clients',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);

        try{
            $requestData = $request->all();
            $plans = Plan::whereIn('id', $request->plan_id)->get();
            $count = $plans->count();
            $a = 1;
            $subtotal = 0;
            if($count != 0)
            {
                for($i=0; $i<$count; $i++)
                {
                    $subtotal += $plans[$i]->amount;
                }

                $vat = $subtotal*5/100;
                $discount = $subtotal*0/100;
                $grandTotal = $subtotal+$vat-$discount;
            }

            return view('pages.regDetails', compact('requestData', 'plans', 'a', 'grandTotal','vat', 'discount', 'subtotal'));
        }catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message'=>$e->getMessage()]);
        }

    }

    // public function backDetails(Request $request) 
    // {   
    //     $requestData = json_decode($request->requestData);
    //     return redirect()->back()->with('requestData', $requestData);
    // }

    public function thankyou(Request $request)
    {
        // DB::beginTransaction();

        // try{
            $requestData = json_decode($request->requestData);
            $count = Plan::whereIn('id', $requestData->plan_id)->get()->count();

            // CREATE CLIENT
            $client = new Client();
            $client->first_name = $requestData->first_name;
            $client->last_name = $requestData->last_name;
            $client->email = $requestData->email;
            $client->password = Hash::make($requestData->password);
            $client->save();
            $details = array();

            // CREATE TERMINAL
            for($i=0; $i<$count; $i++)
            {
                $rand_password = \App\Helpers\Helper::rand_string(8);
                $terminal = new Terminal();
                $terminal->username = 'ctp';
                $terminal->password = Hash::make($rand_password);
                $terminal->client_id = $client->id;
                $terminal->plan_id = $requestData->plan_id[$i];
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

            return view('pages.thankyou');

        // }catch(\Exception $e)
        // {
        //     return response()->json(['status' => 'error', 'message'=>$e->getMessage()]);
        //     DB::rollback();
        // }
    }

}
