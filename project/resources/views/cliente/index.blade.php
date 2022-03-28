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
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Successo!</strong>  {{ session('status') }}  
  </div>         
                           
                    @endif
                    <div class="table-responsive">

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">nome</th>

                            <th scope="col">endereço </th>
                            <th scope="col">email</th>
                            
                            <th scope="col">telefone</th>
                            <th scope="col">Situação</th>

                            <th colspan='3'>Ações</th>
                            <th>  <input class="form-control" id="myInput" type="text" placeholder="Search.."></th>



                            </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($clientes as $c)
                        <tr>

                            <td >{{$c->id}}</td>
                            <td>{{$c->nome}}</td>
                           
                            <td>{{$c->endereco}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->contato}}</td>
                            <td>{{$c->status}}</td>

                            <td><a class="btn btn-info " href="clientes/{{$c->id}}/eye"><i class="fa fa-eye" ></i></a> </td>

                            <td><a class="btn btn-warning " href="clientes/{{$c->id}}/edit"><i class="fa fa-edit" ></i></a> </td>
                            <td>   <form action="clientes/delete/{{$c->id}}" method="post"> @csrf @method('delete')<button class="btn btn-danger"><i class="fa fa-trash" ></i></button></form></td>
                            <td></td>    
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan='11'><a class="btn btn-primary " href="{{url('clientes/new')}}"><i class="fa fa-plus" ></i></a></td>

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
