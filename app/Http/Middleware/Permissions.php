<?php

namespace App\Http\Middleware;

use Closure,Route,Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class Permissions
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
        if(Helper::Buscar_Valor(Auth::user()->r_role->permisos,Route::currentRouteName()) == true):
            return $next($request);
        else:
            return redirect('/');
        endif;
    }
}
