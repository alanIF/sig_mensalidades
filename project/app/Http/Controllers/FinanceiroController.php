<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Mensalidade;

class FinanceiroController
{
   public function atualizar_status($mensalidades){
       $data_atual =date('d/m/Y'); 
       $data_atual =explode("/" ,$data_atual);
       $user = Auth::id();
      
       foreach($mensalidades as $m){
            $mensalidade= Mensalidade::findOrFail($m->id);
            if(strcmp($m->status, "Pago")==0){
                
            }else{
                if($data_atual[2]>$m->ano_vencimento){

                    $mensalidade->status= "Atrasado";
                    $mensalidade->save();
                }else{
                    if($data_atual[1]>$m->mes_vencimento){
                        $mensalidade->status= "Atrasado";
                        $mensalidade->save();               
                    }else{
                        if(($data_atual[1]==$m->mes_vencimento)&&($data_atual[0]>$m->dia_vencimento)){
                            $mensalidade->status= "Atrasado";
                            $mensalidade->save();                
                        }
                    }
                }
            }
            
       }

   }
}