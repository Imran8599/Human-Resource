<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class DashboardMiddleware
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
        if(Session::get('admin_email') == '')
            return redirect('admin-login');
        else
            return $next($request);
    }
}
