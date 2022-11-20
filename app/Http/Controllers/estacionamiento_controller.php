<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estacionamiento;

class estacionamiento_controller extends Controller
{
    public function index()
    {
        $estacionamiento = DB::table('estacionamiento')
            ->get();
        return $estacionamiento;
    }

    public function save(Request $request)
    {
        if ($request->id == 0) {
            $estacionamiento = new Estacionamiento();
        } else {
            $estacionamiento = Estacionamiento::find($request->id);
        }

        $estacionamiento->nombre_estacionamiento = $request->nombre_estacionamiento;
        $estacionamiento->localizacion_estacionamiento = $request->localizacion_estacionamiento;
        
        $estacionamiento->save();
        return $estacionamiento;
    }

    public function delete(Request $request){
        $estacionamiento = Estacionamiento::find($request -> id);
        $estacionamiento->delete();
        return "Estacionamiento eliminado";
    }
}
