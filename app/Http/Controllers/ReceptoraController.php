<?php

namespace App\Http\Controllers;
use App\Models\Receptora;

use Illuminate\Http\Request;

class ReceptoraController extends Controller
{
    public function __construct(){
        //protegemos la url
        //al metodo index con el constructor le pasamos el parametro de autenticacion
        $this->middleware('auth');
    }
    //retornar vista de lista de empresas receptoras
    public function index() {
        $receptoras = Receptora::all();
        return view('receptora.lista')->with(['receptoras' => $receptoras]);;
    }
    //eliminar empresa receptora con un id
    public function delete($id)
    {
        Receptora::find($id)->delete();
        return redirect()->back()->with('success', 'Empresa Receptora eliminada correctamente');
    }
    //redireccionar a vista de formulario
    public function create()
    {
        return view('receptora.create');
    }
    //guardar en la base de datos lo leido del formulario, antes valida
    public function store(Request $request) {
        
        //validaciones del formulario de empresa receptora
        $this->validate($request,[
            'nombre'=>'required', 
            'direccion'=>'required', 
            'rfc'=>'required|min:12|max:13|unique:receptoras',
            'contacto'=>'required', 
            'email'=>'required|email|unique:receptoras',
        ]);

        //Invocar el modelo Receptora para crear el registro
        Receptora::create([
            'nombre'=>$request->nombre,
            'direccion'=>$request->direccion,
            'rfc'=>$request->rfc,
            'contacto'=>$request->contacto,
            'email'=>$request->email,
            
        ]);

        //redireccionamiento a listado
        return redirect()->route('receptora.index')->with('agregada', 'Empresa Receptora agregada correctamente');;

        
    }
}
