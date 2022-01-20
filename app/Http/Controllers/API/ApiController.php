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
        $terminal = Terminal::where('id', $decryptString->t_id)->first();
        $tests = $terminal->plan->tests;

        $job = new Job();
        $job->client_id = $decryptString->c_id;
        $job->terminal_id = $decryptString->t_id;
        $job->ud_id = $decryptString->ud_id;
        $job->save();

        return response()->json([
            't_id' => $decryptString->t_id,
            'c_id' => $decryptString->c_id,
            'ud_id' => $decryptString->ud_id,
            'jobHash' => $job->id
        ]);
    }
}
