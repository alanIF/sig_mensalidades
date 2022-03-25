@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong>                                 {{ session('status') }}  

                </div>

                           
                           
                    @endif

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Valor</th>

                            <th scope="col">Data de Vencimento </th>
                            <th scope="col">Data de Pagamento</th>
                            
                            <th scope="col">Situação</th>

                            <th colspan='3'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mensalidades as $m)
                        <tr>

                            <td >{{$m->id}}</td>
                            <td>{{$m->cliente}}</td>
                           
                            <td>{{$m->valor}}</td>
                            <td>{{$m->dia_vencimento}}/{{$m->mes_vencimento}}/{{$m->ano_vencimento}}</td>
                            <td>{{$m->data_pagamento}}</td>
                            <td>{{$m->status}}</td>
                            <td>   <form action="mensalidades/pagar/{{$m->id}}" method="post"> @csrf @method('post')<button class="btn btn-warning"><i class="fa fa-bank" ></i></button></form></td>


                            <td><a class="btn btn-warning " href="mensalidades/{{$m->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="mensalidades/delete/{{$m->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='8'><a class="btn btn-primary " href="{{url('mensalidades/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
