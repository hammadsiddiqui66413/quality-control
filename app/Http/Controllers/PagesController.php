<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Test;
use App\Models\User;
use App\Models\Client;
use App\Models\Terminal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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

    public function getAmountByPlan(Request $request)
    {
        $plan = Plan::where('id', $request->id)->first();
        $amount = $plan->amount;

        return response()->json(['status'=>'200', 'amount'=>$amount]);
    }

    public function planDetail($id)
    {
        $plan = Plan::findOrFail($id);
        return view('pages.planDetail', compact('plan'));
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
            // Log::debug('plan_id array');
            // Log::debug(json_encode($request->plan_id));
            $plans = Plan::whereIn('id', $request->plan_id)->get();
            $count = $plans->count();
            $a = 1;
            $grandTotal = 0;
            if($count != 0)
            {
                for($i=0; $i<$count; $i++)
                {
                    $grandTotal += $plans[$i]->amount;
                }
            }

            return view('pages.regDetails', compact('requestData', 'plans', 'a', 'grandTotal'));
        }catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message'=>$e->getMessage()]);
        }

    }

    public function thankyou(Request $request)
    {
        // DB::beginTransaction();

        // try{
            $requestData = json_decode($request->requestData);
            $count = Plan::whereIn('id', $requestData->plan_id)->get()->count();
            // dd($count, $requestData->plan_id);

            $client = new Client();
            $client->first_name = $requestData->first_name;
            $client->last_name = $requestData->last_name;
            $client->email = $requestData->email;
            $client->password = Hash::make($requestData->password);
            $client->save();
            $details = array();

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