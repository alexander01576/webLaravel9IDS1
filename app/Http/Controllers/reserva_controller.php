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
}
