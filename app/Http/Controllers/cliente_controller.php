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
        //hacer el left join a la tabla de carro
        ->join('carro', 'cliente.id_carro_cliente', '=', 'carro.id')
        ->select('cliente.*', 'carro.placas_carro as placasCarro')
        ->addSelect('carro.id as carro_cliente')
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
        
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->ap_pat_cliente = $request->ap_pat_cliente;
        $cliente->ap_mat_cliente = $request->ap_mat_cliente;
        $cliente->email_cliente = $request->email_cliente;
        $cliente->celular_cliente = $request->celular_cliente;
        $cliente->estatus_cliente = $request->estatus_cliente;
        $cliente->id_carro_cliente = $request->id_carro_cliente;

        if ($request->file('imagen') != null) {
            $path = $request->file('imagen')->store('public');
            $cliente->imagen_cliente = $path;
        }
        
        $cliente->save();
        return $cliente;
    }

    public function delete(Request $request){
        $cliente = Cliente::find($request->id);
        $cliente->delete();
        return "Cliente eliminado";
    }
}
