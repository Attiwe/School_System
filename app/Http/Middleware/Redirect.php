<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Redirect 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth('web')->check()) {
            return redirect()->route('selection');
        }
        if (!auth('student')->check()) {
            return redirect ()->route('selection');
        }
        if (!auth('teacher')->check()) {
            return redirect()->route('selection');
        }
        if (!auth('parent')->check()) {
            return redirect()->route('selection');
        }
      
         return  redirect('/');
    }
}
