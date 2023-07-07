<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Emisora;
use App\Models\Receptora;
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
    public function create(){
        // Se obtienen todas las empresas emisoras
        $emisoras = Emisora::all();
        // Se obtienen todas las empresas receptoras
        $receptoras = Receptora::all();
        // Retornar la vista para crear facturas
        return view('factura.create', compact('emisoras','receptoras'));
    }

    //eliminar factura con un id
    public function delete($id)
    {
        Factura::find($id)->delete();
        return redirect()->back()->with('success', 'Factura eliminada correctamente');
    }
    
    public function store(Request $request) {
       
        $request->validate([
            'emisora_id' => 'required',
            'receptora_id' => 'required',
            'folio' => 'required|unique:facturas|min:5',
            'pdf' => 'required',
            'xml' => 'required',
        ]);

 
        // // Crear una nueva factura en la base de datos
        Factura::create([
            'emisora_id' => $request->emisora_id,
            'receptora_id' => $request->receptora_id,
            'folio' => $request->folio,
            'pdf' => $request->pdf,
            'xml' => $request->xml,
        ]);

       

        //redireccionamiento
        return redirect()->route('factura.index')->with('agregada', 'Factura agregada correctamente.');

        
    }
}
