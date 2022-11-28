<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;

class reserva_controller extends Controller
{
    public function index()
    {
        $reserva = DB::table('reserva')
            ->get();
        return $reserva;
    }

    public function save(Request $request)
    {
        if ($request->id == 0) {
            $reserva = new Reserva();
        } else {
            $reserva = Reserva::find($request->id);
        }

        $reserva->estatus_reserva = $request->estatus_reserva;
        $reserva->id_cliente_reserva = $request->id_cliente_reserva;
        $reserva->id_cajon_reserva = $request->id_cajon_reserva;
        $reserva->fecha_reserva = $request->fecha_reserva;
        
        $reserva->save();
        return $reserva;
    }

    public function delete(Request $request){
        $reserva = Reserva::find($request -> id);
        $reserva->delete();
        return "Reserva eliminada";
    }
    
    public function view(Request $request){
        $reserva = DB::table('reserva')
            ->join('cliente', 'reserva.id_cliente_reserva', '=', 'cliente.id')
            ->join('carro', 'cliente.id_carro_cliente', '=', 'carro.id')
            ->select('reserva.id as id_reserva', 'reserva.estatus_reserva', 'reserva.fecha_reserva', 'carro.placas_carro', DB::raw("CONCAT(cliente.nombre_cliente, ' ', cliente.ap_pat_cliente) as nombre_cliente"))
            ->where('reserva.id_cliente_reserva', '=', $request->id)
            ->get();

        return $reserva;
    }
}
