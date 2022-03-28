@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cliente: {{$mensalidades[0]->cliente}} </div>

                <div class="card-body">
                @if (session('status'))
                 
              
        <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Successo!</strong>  {{ session('status') }}  
  </div>

                           
                           
                    @endif
                    <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Valor</th>

                            <th scope="col">Data de Vencimento </th>
                            <th scope="col">Data de Pagamento</th>
                            
                            <th scope="col">Situação</th>

                            <th colspan='3'>Ações</th>
                            <th>  <input class="form-control" id="myInput" type="text" placeholder="Search.."></th>


                            </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($mensalidades as $m)
                        @if(strcmp($m->status, "Pago")==0)
                            <tr class="table-success">
                        @elseif(strcmp($m->status, "Atrasado")==0)
                            <tr class="table-danger">
                        @else
                        <tr class="table-info">

                        @endif
                        

                            <td >{{$m->id}}</td>
                           
                            <td>{{$m->valor}}</td>
                            <td>{{$m->dia_vencimento}}/{{$m->mes_vencimento}}/{{$m->ano_vencimento}}</td>
                            <td>{{$m->data_pagamento}}</td>
                            <td>{{$m->status}}</td>
                            <td>   <form action="mensalidades/pagar/{{$m->id}}" method="post"> @csrf @method('post')<button class="btn btn-warning"><i class="fa fa-bank" ></i></button></form></td>


                            <td><a class="btn btn-warning " href="mensalidades/{{$m->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="mensalidades/delete/{{$m->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                           <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='10'><a class="btn btn-primary " href="{{url('mensalidades/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                    </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
