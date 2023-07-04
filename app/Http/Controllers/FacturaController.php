<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FacturaController extends Controller
{
    public function __construct(){
        //protegemos la url
        //al metodo index con el constructor le pasamos el parametro de autenticacion
        $this->middleware('auth');
    }
    //retornar vista de lista de facturas
    public function index() {
        $facturas = Factura::all();
        return view('factura.lista')->with(['facturas' => $facturas]);;
    }
    //redireccionar a vista de formulario
    public function create()
    {
        return view('factura.create');
    }

    
    public function store_pdf(Request $request)
    {
        $pdf = $request->file('file');
        // Se obtiene el nombre del archivo
        
        $nombrepdf = Str::uuid() . ".". $pdf->extension();
        //Se obtiene el path en donde queremos almecenar el archivo
        $pdfPath = public_path('uploads_pdf') . '/' . $nombrepdf;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($pdf,$pdfPath);

        return response()->json([
            'pdf' => $nombrepdf
        ]);
        
    }

    public function store_xml(Request $request)
    {
        $xml = $request->file('file');
        // Se obtiene el nombre original del archivo
        $nombrexml = Str::uuid() . ".xml";

        //Se obtiene el path en donde queremos almecenar el archivo
        $xmlPath = public_path('uploads_xml') . '/' . $nombrexml;
        //Con la creación del archivo, se coloca en la ruta establecida
        copy($xml,$xmlPath);
        
        return response()->json([
            'xml' => $nombrexml
        ]);
        
    }

    public function store(Request $request) {
        //validaciones del formulario de registros
        $this->validate($request,[
            //Reglas de validacion 
            'pdf' => 'required',
            'xml' => 'required',
        ]);

        //guradra los campos en el modelo posts
        /*posts::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->imagen,
            //identificamos el usuario autenticado
            'user_id'=>auth()->user()->id,

            
        ]);*/

        //guardar registro con relaciones(E-R)
        //"post" es el nombre de la relacion
        $request->user()->post()->create([
            'pdf'=>$request->pdf,
            'xml'=>$request->xml,
        ]);

        //redireccionamiento
        return redirect()->route('facturas.index',auth()->user()->username);

        
    }
}
