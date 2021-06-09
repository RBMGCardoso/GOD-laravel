<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('LoggedUser') != null)
        {
            return $next($request);
        }
        return redirect('')->with('jsLoginAlert', 'Por favor faça login antes de acessar o site.');
    }
}
