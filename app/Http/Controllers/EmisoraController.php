<?php

namespace App\Http\Controllers;
use App\Models\Emisora;
use Illuminate\Http\Request;

class EmisoraController extends Controller
{
    public function __construct(){
        //protegemos la url
        //al metodo index con el constructor le pasamos el parametro de autenticacion
        $this->middleware('auth');
    }
    //retornar vista de lista de empresas emisoras
    public function index() {
        $emisoras = Emisora::all();
        return view('emisora.lista')->with(['emisoras' => $emisoras]);;
    }
    //eliminar empresa emisora con un id
    public function delete($id)
    {
        Emisora::find($id)->delete();
        return redirect()->back()->with('success', 'Empresa Emisora eliminada correctamente');
    }
    //redireccionar a vista de formulario
    public function create()
    {
        return view('emisora.create');
    }
    //guardar en la base de datos lo leido del formulario, antes valida
    public function store(Request $request) {
        
        //validaciones del formulario de empresa emisora
        $this->validate($request,[
            'razon'=>'required',  
            'rfc'=>'required|min:12|max:13|unique:emisoras',
            'email'=>'required|email|unique:emisoras',
        ]);

        //Invocar el modelo emisora para crear el registro
        Emisora::create([
            'razon'=>$request->razon,
            'rfc'=>$request->rfc,
            'email'=>$request->email,
            
        ]);

        //redireccionamiento a listado
        return redirect()->route('emisora.index')->with('agregada', 'Empresa Emisora agregada correctamente');;

        
    }
}
