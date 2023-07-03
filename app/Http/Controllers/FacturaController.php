<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Identificar el archivo que se sube en dropzone
        $archivo = $request->file('file');

        // Generar un nombre único para el archivo PDF
        $nombreArchivo = Str::uuid() . '.' . $archivo->getClientOriginalExtension();

        // Mover el archivo a una ubicación en el servidor
        $rutaArchivo = 'uploads_pdf/' . $nombreArchivo;
        Storage::disk('public')->put($rutaArchivo, file_get_contents($archivo));

        // Devolver la ruta del archivo guardado
        return response()->json(['archivo' => $rutaArchivo]);
    }
}
