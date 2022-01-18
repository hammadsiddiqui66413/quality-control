<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class ClientLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:client' , ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('auth.client_login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('client.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        // dd('kidhar');
        Auth::guard('client')->logout();
        return redirect()->route('client.login');
    }
}