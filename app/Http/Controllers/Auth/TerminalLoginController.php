<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
class TerminalLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:terminal', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.terminal_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'username'   => 'required',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('terminal')->attempt(['username' => $request->username, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('terminal.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('terminal')->logout();
        return redirect('/terminal');
    }
}