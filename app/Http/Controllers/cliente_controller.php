<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class cliente_controller extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        return $cliente;
    }

    public function save(Request $request){
        if($request->id == 0){
            $cliente = new Cliente();
        }else{
            $cliente = Cliente::find($request->id);
        }
        
        $cliente->nombre = $request->nombre;
        $cliente->ap_pat = $request->ap_pat;
        $cliente->ap_mat = $request->ap_mat;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->estatus = $request->estatus;
        $cliente->imagen = $request->imagen;
        
        $cliente->save();
        return $cliente;
    }

    public function delete(Request $request){
        $cliente = Cliente::find($request->id);
        $cliente->delete();
        return "OK - eliminado";
    }
}
