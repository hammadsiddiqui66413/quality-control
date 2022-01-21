<?php
namespace App\Http\Controllers\Auth;

use App\Models\Job;
use App\Models\Report;
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use PDF;

class TerminalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:terminal');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminal = Terminal::where('id', auth()->user()->id)->first();
        
        // $encryptedQr = QrCode::size(200)
        //     ->format('png')
        //     ->generate(Crypt::encryptString('c_id:'.$terminal->client->id.' t_id:'.$terminal->id), storage_path('qrcode/code_'.time().'.png')); 

        return view('terminal.index', compact('terminal'));
    }

    public function jobs()
    {
        $jobs = Job::where('terminal_id', auth()->user()->id)->get();
        $i = 1;
        return view('terminal.jobs', compact('jobs', 'i'));
    }

    public function reports($id)
    {

        $reports = Report::where('job_id', $id)->get();
        $terminal = Terminal::where('id', auth()->user()->id)->first();
        $job = Job::where('id', $id)->first();
        $client = $terminal->client;
        $i = 1;

        $pdf = PDF::loadView('terminal.reports', compact('reports', 'i','client','terminal','job'));
        return $pdf->stream();
    }

    
}