@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cliente</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('clientes/update')}}/{{$cliente->id}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="nome" class="form-control" placeholder="Nome"  value="{{$cliente->nome}}" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$cliente->email}}" required>
            </div>
            <div class="mb-3">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{$cliente->endereco}}" required>
            </div>
            <div class="mb-3">
                <input type="tell" name="contato" class="form-control" placeholder="Telefone"  value="{{$cliente->contato}}" required>
            </div>
            <div class="mb-3">
            <select class="form-control" name="status">
                        <option value="Ativo">Ativo</option>
                        <option value="Desativado">Desativado</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a class="btn btn-warning " href="{{url('clientes/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('clientes/add')}}" method="post"> 
            @csrf
            <div class="mb-3">
                <input type="text" name="nome" class="form-control" placeholder="Nome"  required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" required>
            </div>
            <div class="mb-3">
                <input type="tell" name="contato" class="form-control" placeholder="Telefone" required>
            </div>
            <div class="mb-3">
            <select class="form-control" name="status">
                        <option value="Ativo">Ativo</option>
                        <option value="Desativado">Desativado</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a class="btn btn-warning " href="{{url('clientes/')}}">Voltar</a>
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection