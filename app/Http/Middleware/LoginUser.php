<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        $user = Auth::user();
        foreach($roles as $role)
        {
            if($role == 'Student' && $user->role == '2')
            {
                return $next($request);
            }
            elseif($role == 'Admin' && $user->role == '1')
            {
                return $next($request);
            }
        }
        //  role == '2' means student
        //  role == '1' means Admin

        return redirect()->route('login');
    }
}
