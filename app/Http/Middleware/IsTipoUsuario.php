<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTipoUsuario
{
    
    public function handle(Request $request, Closure $next, ...$tipo_usuario_ids)
    {
        //Pasamos el array a Laravel Collection (https://laravel.com/docs/8.x/collections) para trabajar con contains
        if(collect($tipo_usuario_ids)->contains(Auth::user()->tipo_usuario_id)){
            return $next($request);
        }
        else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
