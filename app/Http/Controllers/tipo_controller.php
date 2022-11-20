<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo;


class tipo_controller extends Controller
{
    public function index()
    {
        $tipo = DB::table('tipo')
            ->get();
        return $tipo;
    }

    public function save(Request $request)
    {
        if ($request->id == 0) {
            $tipo = new Tipo();
        } else {
            $tipo = Tipo::find($request->id);
        }
        $tipo->nombre_tipo = $request->nombre_tipo;

        $tipo->save();

        return $tipo;
    }

    public function delete(Request $request){
        $tipo = Tipo::find($request->id);
        $tipo->delete();
        return "Tipo eliminado";
    }
}
