<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\decryptString;
use Illuminate\Support\Facades\Crypt;
use App\Models\Job;

class ApiController extends Controller
{
    public function getPlanTests(Request $request)
    {

        $decryptString = Crypt::decrypt();
        $terminal = Terminal::where('id', auth()->user()->id)->first();
        $tests = $terminal->plan->tests;

        $job = new Job();
        $job->client_id = $terminal->client->id;
        $job->terminal_id = $terminal->id;
        $job->ud_id = '123123456';
        $job->save();

        return response()->json([
            't_id' => $terminal->id,
            'c_id' => $terminal->client->id,
            'ud_id' => '123123456',
            'job_id' => $job->id
        ]);
    }
}
