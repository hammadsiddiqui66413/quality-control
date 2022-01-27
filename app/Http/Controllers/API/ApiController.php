<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\decryptString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Job;
use App\Models\Terminal;
use App\Models\Report;

class ApiController extends Controller
{
    public function getPlanTests(Request $request)
    {
        try{
           $decrypted = Crypt::decryptString($request->hash);
            $decoded = json_decode($decrypted, true);
            $terminal_id = $decoded['t_id'];
            $client_id = $decoded['c_id'];
            $terminal = Terminal::where('id', $terminal_id)->first();
            $tests = $terminal->plan->tests;
            $job = new Job();
            $job->client_id = $client_id;
            $job->terminal_id = $terminal_id;
            $job->ud_id = $request->udid;
            $job->save();

            return response()->json([
                'success'=> true,
                'message' => 'Request Completed Successfully',
                'hash' => $request->hash,
                'ud_id' => $request->udid,
                'tests' => $tests,
                'job_id' => $job->id
            ]);
        }catch(\Illuminate\Contracts\Encryption\DecryptException $e)
        {
            return response()->json(['status' => false, 'message' => 'Request Failed']);
        }
    }

    public function storeReports(Request $request)
    {
        $decrypted = Crypt::decryptString($request->hash);
        $decoded = json_decode($decrypted, true);
        $terminal_id = $decoded['t_id'];
        $client_id = $decoded['c_id'];
        $udid = $request->udid;
        $job_id = $request->job_id;
        $tests = $request->tests;
        $count = count($request->tests);

        for($i=0; $i<$count; $i++)
        {
            $status = $tests[$i]['status'];
            $test_id = $tests[$i]['id'];
            $report = new Report();
            $report->status = $status;
            $report->test_id = $test_id;
            $report->terminal_id = $terminal_id;
            $report->client_id = $client_id;
            $report->ud_id = $udid;
            $report->job_id = $job_id;
            $report->save();
        }

        return response()->json(['status' => true, 'Message' => 'Report Genetrated Successfully']);
    }
}

