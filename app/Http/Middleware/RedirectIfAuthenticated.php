<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
 
        switch ($guard) {
            case 'client':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('client.dashboard');
              }

              case 'terminal':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('terminal.dashboard');
                }
             
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/admin');
              }
              break;
          }
          return $next($request);
          
    }
}