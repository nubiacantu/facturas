<?php

namespace App\Http\Controllers;
use App\Models\Emisora;
use App\Models\Receptora;
use Illuminate\Http\Request;
use App\Models\Factura;

class PortalController extends Controller
{
    //retornar vista de lista de formulario de busqueda
    public function index() {
        // Se obtienen todas las empresas emisoras
        $emisoras = Emisora::all();
        // Se obtienen todas las empresas receptoras
        $receptoras = Receptora::all();
        // Retornar la vista para buscar facturas
        return view('portal.buscar',compact('emisoras','receptoras'));
    }
    //mostrar el listado de facturas consultadas segun lo recibido del formulario
    public function lista(Request $request) {
        //lo guarda en la session flash
        $facturas = $request->session()->get('facturas');
        //manda los datos a la vista
        return view('portal.lista', compact('facturas'));
    }
    
    
    
    //busca en la base de datos los valores de factura 
    public function buscar(Request $request) {
        //valida los datos requerdos
        $request->validate([
            'emisora_id' => 'required',
            'receptora_id' => 'required',
            'rfc' => 'required',
        ]);
        //se busca que coincida el frc con el id de la empresa receptora
        $receptora = Receptora::where('id', $request->receptora_id)
            ->where('rfc', $request->rfc)
            ->first();
        
        if ($receptora) {
            //se agregan como condicion de consuta la empresa emisora y receptora
            $query = Factura::where('emisora_id', $request->emisora_id)
                ->where('receptora_id', $request->receptora_id);
            //si el folio se llenó tambien se agrega como condicion
            if ($request->filled('folio')) {
                $query->where('folio', $request->folio);
            }
            //se ejecuta la consulta
            $facturas = $query->get();
            //si se reciben facturas de la consulta te manda al listado
            if ($facturas->count() > 0) {
                return redirect()->route('portal.lista')->with('facturas', $facturas);

            } else {
            //si no coincide con fcaturas en la base de datos manda mansaje
                return redirect()->route('portal.index')->with('no_encontrada', 'Los datos ingresados no corresponden a ninguna factura.');
            }
        } else {
            //si el rfc y nombre de la empresa receptora no coinciden manda un mensaje
            return redirect()->route('portal.index')->with('no_encontrada', 'El RFC ingresado no coincide con la empresa receptora seleccionada.');
        }
    }
    
    

}
