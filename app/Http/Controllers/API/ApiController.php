<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\decryptString;
use Illuminate\Support\Facades\Crypt;
use App\Models\Job;
use App\Models\Terminal;

class ApiController extends Controller
{
    public function getPlanTests()
    {
        $decryptString = Crypt::decrypt();
        $terminal = Terminal::where('id', $decryptString->t_id)->first();
        $tests = $terminal->plan->tests;

        $job = new Job();
        $job->client_id = $decryptString->client->c_id;
        $job->terminal_id = $decryptString->t_id;
        $job->ud_id = '123123456';
        $job->save();

        return response()->json([
            't_id' => $decryptString->t_id,
            'c_id' => $decryptString->client->c_id,
            'ud_id' => $decryptString->ud_id_id,
            'job_id' => $job->id
        ]);
    }
}
