<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\decryptString;
use Illuminate\Support\Facades\Crypt;
use App\Models\Job;
use App\Models\Terminal;

class ApiController extends Controller
{
    public function getPlanTests(Request $request)
    {
        try{    
           $decrypted = Crypt::decrypt($request->hash);
            $decoded = json_decode($decrypted, true);
            $terminal_id = $decoded['t_id'];
            $client_id = $decoded['c_id'];
            $terminal = Terminal::where('id', $terminal_id)->first();
            $tests = $terminal->plan->tests;

            $job = new Job();
            $job->client_id = $terminal_id;
            $job->terminal_id = $client_id;
            $job->ud_id = $request->udid;
            $job->save();

            return response()->json([
                'success'=> true,
                'message' => 'Request Completed Successfully'
                'hash' => $request->hash,
                'ud_id' => $decryptString->ud_id_id,
                'tests' => $tests,
                'job_id' => $job->id
            ]);
        }catch(\Illuminate\Contracts\Encryption\DecryptException $e)
        {
            return response()->json(['status' => false, 'message' => 'Request Failed'])
        }
    }
}
