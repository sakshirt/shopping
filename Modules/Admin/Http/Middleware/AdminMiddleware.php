<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Role;

class AdminMiddleware
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
//        if(!Auth::check()){
//            return redirect('/');
//        }

        if(!Auth::user()){
////            echo 'dashboard';
////            die();
            return redirect('admin.dashboard');
        }

        return $next($request);
    }
}
