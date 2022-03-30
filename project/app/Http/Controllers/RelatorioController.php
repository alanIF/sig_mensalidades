<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    //
    public function index()
    {
        $user = Auth::id();
        $sql = 'Select sum(m.valor) receitas from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id and m.status like "%Pago%"';
        $receitas = \DB::select($sql);
        $sql = 'Select sum(m.valor) aberto from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id and m.status like "%Aberto%"';
        $aberto = \DB::select($sql);
    $sql = 'Select sum(m.valor) atrasado from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id and m.status like "%Atrasado%"';
        $atrasado= \DB::select($sql);
        $dados= Array();
        
        foreach($receitas as $r){
            $dados['receita'] =$r->receitas;
        }
        foreach($aberto as $a){
            $dados['aberto'] =$a->aberto;
        }
        foreach($atrasado as $at){
            $dados['atrasado'] =$at->atrasado;
        }
        return view('relatorios.index', ['dados'=> $dados]);
    }
}
