<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mensalidade;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FinanceiroController;

use Redirect;

class ClienteController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select * from cliente c where c.user_id='.$user.'';
        $clientes = \DB::select($sql);
        
        return view('cliente.index', ['clientes' => $clientes]);
    }
    public function eye($id_cliente){
        $user = Auth::id();

        $sql = 'Select m.id id, c.nome cliente, m.dia_vencimento dia_vencimento, m.mes_vencimento mes_vencimento, m.ano_vencimento ano_vencimento, m.data_pagamento data_pagamento, m.valor valor, m.status status from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id and c.id='.$id_cliente;
        $mensalidades = \DB::select($sql);
        $financeiro = new FinanceiroController();

        $financeiro->atualizar_status($mensalidades);
        return view('cliente.eye', ['mensalidades' => $mensalidades]);

    }
    // form de cadastrar
    public function new(){
        return view('cliente.form');
    }
    public function add(Request $request){
        $cliente  = new Cliente();
        $user = Auth::id();
        
        $cliente ->nome=$request->nome;
        $cliente ->email=$request->email;
        $cliente ->endereco=$request->endereco;
        $cliente ->contato=$request->contato;
        $cliente ->status=$request->status;

        $cliente->user_id= $user;
        $cliente->save(); 
        

       
        return Redirect::to('/clientes')->with('status', 'cliente adicionado com sucesso');
    }
    public function update($id ,Request $request){
        $cliente= Cliente::findOrFail($id);
        $user = Auth::id();

        $cliente ->nome=$request->nome;
        $cliente ->email=$request->email;
        $cliente ->endereco=$request->endereco;
        $cliente ->contato=$request->contato;
        $cliente ->status=$request->status;

        $cliente->user_id= $user;
        $cliente->save(); 

        return Redirect::to('/clientes')->with('status', 'cliente atualizado com sucesso');;
    }
    public function edit($id){
        $cliente= Cliente::findOrFail($id);
        return view('cliente.form', ['cliente'=> $cliente]);
    }
    public function delete($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return Redirect::to('/clientes')->with('status', 'cliente exclu??do com sucesso');;
    }

}
