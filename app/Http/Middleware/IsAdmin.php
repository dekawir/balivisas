<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , $role)
    {
        $user = Auth::user();

        if($role == 'admin' && $user->is_admin == '0'){
            Alert::error('error','You are not admin');
            return redirect()->route('dashboard.0');
        }

        if($role == 'user' && $user->is_admin == '1'){
            Alert::error('error','You are not user');
            return redirect()->route('dashboard.1');
        }

        return $next($request);


    }
}
