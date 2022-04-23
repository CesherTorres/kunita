<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(auth()->user()->tipousuario_id){
            case ('1'):
                return redirect()->route('administrador.index');//si es administrador continua al weolcome
            break;
            case ('2'):
                return redirect()->route('asesores.index');//si es asesor continua al asesores
            break;
            case ('3'):
                
                return redirect()->route('pyme.index');//si es administrador continua al pyme
                


        }
       
    }
}
