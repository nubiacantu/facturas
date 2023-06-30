<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {
        return view('login');
    }
    //validar formulario de login
    public function store(Request $request) {
   
        //reglas de validacion
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        

        //verificar que las credenciales sean correctas
        if(!auth()->attempt($request->only('username','password'),$request->remember)){
            //usar la directica with para llenar los valores de la sesión
            return back()->with('mensaje','Usuario y/o contraseña incorrectas, vuelva a intentarlo.');
        }

        //credenciales correctas
        return redirect()->route('dashboard',auth()->user()->username);
    }
}
