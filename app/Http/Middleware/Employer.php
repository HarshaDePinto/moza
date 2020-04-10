<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Employer
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
        if (Auth::user()) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('admin');
            }

            if (Auth::user()->role_id == 2) {
                return redirect()->route('student');
            }

            if (Auth::user()->role_id == 3) {
                return redirect()->route('employer');
            }
        }
        return redirect()->route('welcome');
    }
}
