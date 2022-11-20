<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Administrador;

class administrador_controller extends Controller
{
    public function index(){
        $administrador = DB::table('administrador')
        ->get();
        return $administrador;
    }

    public function save(Request $request){
        if($request->id == 0){
            $administrador = new Administrador();
        }else{
            $administrador = Administrador::find($request-> id);
        }

        $administrador->nombre_administrador = $request->nombre_administrador;
        $administrador->a_pat_administrador = $request->a_pat_administrador;
        $administrador->a_mat_administrador = $request->a_mat_administrador;
        $administrador->email_administrador = $request->email_administrador;
        $administrador->celular_administrador = $request->celular_administrador;
        $administrador->id_estacionamiento_administrador = $request->id_estacionamiento_administrador;

        $administrador->save();
        return $administrador;
    }

    public function delete(Request $request){
        $administrador = Administrador::find($request->id);
        $administrador->delete();
        return "Administrador eliminado";
    }

}
