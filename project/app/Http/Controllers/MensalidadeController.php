<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensalidade;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;
use Redirect;

class MensalidadeController extends Controller
{
    public function index(){
        $user = Auth::id();

        $sql = 'Select m.id id, c.nome cliente, m.dia_vencimento dia_vencimento, m.mes_vencimento mes_vencimento, m.ano_vencimento ano_vencimento, m.data_pagamento data_pagamento, m.valor valor, m.status status from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id';
        $mensalidades = \DB::select($sql);
        
        return view('mensalidade.index', ['mensalidades' => $mensalidades]);
    }
    // form de cadastrar
    public function new(){
        $user = Auth::id();

        $sql = 'Select * from cliente c where c.user_id='.$user.'';
        $clientes = \DB::select($sql);
        return view('mensalidade.form', ['clientes'=> $clientes]);
    }
    public function add(Request $request){
        $mensalidade = new Mensalidade();
       
        $data_vencimento =explode("-" ,$request->data_vencimento);
      
        $mensalidade->dia_vencimento =$data_vencimento[2] ;
        $mensalidade ->mes_vencimento=$data_vencimento[1];
        $mensalidade ->ano_vencimento=$data_vencimento[0];
        $mensalidade ->valor=$request->valor;
        $mensalidade ->data_pagamento="Não pago";

        $mensalidade ->status=$request->status;
        $mensalidade->cliente_id= $request->cliente_id;


        $mensalidade->save(); 
        

       
        return Redirect::to('/mensalidades')->with('status', 'mensalidade adicionado com sucesso');
    }
    public function update($id ,Request $request){
        $mensalidade= Mensalidade::findOrFail($id);

        $mensalidade ->dia_vencimento=$request->dia_vencimento;
        $mensalidade ->mes_vencimento=$request->mes_vencimento;
        $mensalidade ->ano_vencimento=$request->ano_vencimento;
        $mensalidade ->valor=$request->valor;
        $mensalidade ->data_pagamento= $request->data_pagamento;
        $mensalidade ->status=$request->status;
        $mensalidade->cliente_id= $request->cliente_id;


        $mensalidade->save(); 
        

        return Redirect::to('/mensalidades')->with('status', 'mensalidade atualizada com sucesso');;
    }
    public function pagar($id ,Request $request){
        $mensalidade= Mensalidade::findOrFail($id);

        
        $mensalidade ->data_pagamento=  date('d/m/Y');
        $mensalidade ->status="Pago";
       


        $mensalidade->save(); 
        

        return Redirect::to('/mensalidades')->with('status', 'mensalidade paga com sucesso');;
    }
    public function edit($id){
        $mensalidade= Mensalidade::findOrFail($id);
        return view('mensalidade.form', ['mensalidade'=> $mensalidade]);
    }
    public function delete($id){
        $mensalidade = Mensalidade::findOrFail($id);
        $mensalidade->delete();

        return Redirect::to('/mensalidades')->with('status', 'mensalidade excluída com sucesso');;
    }

}
