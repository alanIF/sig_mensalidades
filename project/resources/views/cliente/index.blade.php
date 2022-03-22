@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">nome</th>

                            <th scope="col">endereço </th>
                            <th scope="col">email</th>
                            
                            <th scope="col">telefone</th>
                            <th scope="col">Situação</th>

                            <th colspan='2'>Ações</th>
                            


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $c)
                        <tr>

                            <td >{{$c->id}}</td>
                            <td>{{$c->nome}}</td>
                           
                            <td>{{$c->endereco}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->contato}}</td>
                            <td>{{$c->status}}</td>


                            <td><a class="btn btn-warning " href="clientes/{{$c->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="clientes/delete/{{$c->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='8'><a class="btn btn-primary " href="{{url('cliente/new')}}"><i class="fa fa-plus" ></i></a></td>

                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection