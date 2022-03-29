<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mensalidade;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FinanceiroController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $sql = 'Select m.id id, c.nome cliente, m.dia_vencimento dia_vencimento, m.mes_vencimento mes_vencimento, m.ano_vencimento ano_vencimento, m.data_pagamento data_pagamento, m.valor valor, m.status status from mensalidade m, cliente c where c.user_id='.$user.' and c.id=m.cliente_id and m.status like "%Atrasado%"';
        $mensalidades = \DB::select($sql);
        return view('home', ['mensalidades'=> $mensalidades]);
    }
}
