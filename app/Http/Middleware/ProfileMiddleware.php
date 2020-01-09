<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();
        if(Session::get('employee_email') == '')
            return redirect('employee-login');
        else
            return $next($request);
    }
}
