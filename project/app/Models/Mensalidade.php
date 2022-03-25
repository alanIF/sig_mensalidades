<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    use HasFactory;
    protected $table= "mensalidade";
    protected $fillable= ['dia_vencimento', 'mes_vencimento','ano_vencimento','valor','status','data_pagamento','cliente_id'];
}
