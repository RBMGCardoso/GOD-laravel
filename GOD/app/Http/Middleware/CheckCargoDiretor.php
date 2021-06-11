<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCargoDiretor
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
        if(session('LoggedUser')->cargo == "Diretor" || session('LoggedUser')->cargo == "Secretaria")
        {   
            return $next($request);
        }
        return redirect('dashboard')->with('jsPermissionAlert', 'Você não tem permissão para aceder a esta página. Se acha que isto é um erro contacte os seus superiores.');
    }
}
