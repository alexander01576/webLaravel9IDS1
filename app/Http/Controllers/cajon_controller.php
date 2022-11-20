<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cajon;

class cajon_controller extends Controller
{
    
    public function index(){
        $cajon = DB::table('cajon')
        ->get();
        return $cajon;
    }

    public function save(Request $request){
        if($request->id == 0){
            $cajon = new cajon();
        }else{
            $cajon = cajon::find($request->id);
        }
        
        $cajon->nombre_cajon = $request->nombre_cajon;
        $cajon->id_estacionamiento_cajon = $request->id_estacionamiento_cajon;
        $cajon->id_carro_cajon = $request->id_carro_cajon;
        
        $cajon->save();
        return $cajon;
    }

    public function delete(Request $request){
        $cajon = cajon::find($request->id);
        $cajon->delete();
        return "Cajon eliminado";
    }

}

