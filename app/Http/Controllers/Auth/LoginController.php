<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function login(Request $request){
        $credentials = $this->validate($request,[
            'email' =>'required|string',
            'password' =>'required|string'
            
        ]);

        $credenciales = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'estadouser' => 'Activo'
        ];

        if(Auth::attempt($credenciales)){
            return redirect('/home');
        }else{
            return back()->withErrors([$this->username()=>'Estas credenciales no concuerdan con nuestros registros']);
          }
        }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
