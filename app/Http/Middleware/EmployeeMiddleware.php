<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class EmployeeMiddleware
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
            return $next($request);
        else
            return redirect('profile');
    }
}
