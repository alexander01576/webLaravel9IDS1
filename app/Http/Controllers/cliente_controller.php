<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Transportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class cliente_controller extends Controller
{
    public function index(){
        //$cliente = Cliente::all();

        $cliente = DB::table('cliente')
        //hacer el left join a la tabla de transportes
        ->leftJoin('transportes', 'cliente.id_Tipo', '=', 'transportes.id')
        //seleccionar los campos de la tabla cliente y transportes
        ->select('cliente.*', 'transportes.nombre as nombreTransporte')
        //seleccionar el id de la tabla transportes
        ->addSelect('transportes.id as idTransporte')
        //obtener los registros
        ->get();

        return $cliente;
    }

    //funcion para obtener el listado de transportes
    public function getTransportes(){
        $transportes = Transportes::all();
        return $transportes;
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
        $cliente->id_Tipo = $request->id_Tipo;
        
        if ($request->file('imagen') != null) {
            $path = $request->file('imagen')->store('public');
            $cliente->imagen = $path;
        }
        
        $cliente->save();
        return $cliente;
    }

    public function delete(Request $request){
        $cliente = Cliente::find($request->id);
        $cliente->delete();
        return "OK - eliminado";
    }
}
