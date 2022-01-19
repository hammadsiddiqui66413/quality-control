<?php
namespace App\Http\Controllers\Auth;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('terminal.index', compact('terminal'));
    }

    public function reports()
    {
        $reports = Report::where('terminal_id', auth()->user()->id)->get();
        $i = 1;
        return view('clients.reports', compact('reports', 'i'));
    }
}