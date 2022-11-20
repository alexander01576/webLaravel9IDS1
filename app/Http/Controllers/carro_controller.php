<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Carro;

class carro_controller extends Controller
{
    public function index(){
        $carro = DB::table('carro')
        ->get();
        return $carro;
    }

    public function save(Request $request){
        if($request->id == 0){
            $carro = new Carro();
        }else{
            $carro = Carro::find($request->id);
        }
        
        $carro->placas_carro = $request->placas_carro;
        $carro->marca_carro = $request->marca_carro;
        $carro->modelo_carro = $request->modelo_carro;
        $carro->color_carro = $request->color_carro;
        $carro->no_puertas_carro = $request->no_puertas_carro;
        $carro->id_tipo_carro = $request->id_tipo_carro;

        $carro->save();
        return $carro;
    }

    public function delete(Request $request){
        $carro = Carro::find($request->id);
        $carro->delete();
        return "Carro eliminado";
    }
}
