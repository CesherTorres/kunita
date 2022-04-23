<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SoloAsesor
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
        switch(auth()->user()->tipousuario_id){
            case ('1'):
                return redirect('admin');//si es administrador continua al HOME
            break;
            case ('2'):
                return $next($request);//si es administrador continua al HOME
            break;
            case ('3'):
                return redirect('pyme');//si es administrador continua al HOME
            break;

        }
    }
}
