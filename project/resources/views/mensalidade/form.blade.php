@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mensalidade</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @if(Request::is('*/edit'))
            <form action="{{url('mensalidades/update')}}/{{$mensalidade->id}}" method="post">
            @csrf
        
            <div class="mb-3">
                <input type="date" name="data_vencimento" class="form-control" placeholder="Data Vencimento"  required>
            </div>
            <div class="mb-3">
                <input type="number" name="valor" class="form-control" placeholder="Valor" value="{{$mensalidade->valor}}" required>
            </div>
           
            <div class="mb-3">
            <select class="form-control" name="status">
                        <option value="Aberto">Aberta</option>
                        <option value="Pago">Pago</option>
                        <option value="Atrasado">Atrasado</option>

            </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a class="btn btn-warning " href="{{url('mensalidades/')}}">Voltar</a>

            </form>
            @endif
            @if(Request::is('*/new'))

            <form action="{{url('mensalidades/add')}}" method="post"> 
            @csrf
            <div class="mb-3">
            <select class="form-control" name="cliente_id">
            @foreach($clientes as $c)

                        <option value="{{$c->id}}">{{$c->nome}}</option>
            @endforeach        

            </select>
            </div>
            <div class="mb-3">
                <input type="date" name="data_vencimento" class="form-control" placeholder="Data Vencimento"  required>
            </div>
            <div class="mb-3">
                <input type="number" name="valor" class="form-control" placeholder="Valor" required>
            </div>
           
            <div class="mb-3">
            <select class="form-control" name="status">
                        <option value="Aberto">Aberta</option>
                        <option value="Pago">Pago</option>
                        <option value="Atrasado">Atrasado</option>

            </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a class="btn btn-warning " href="{{url('mensalidades/')}}">Voltar</a>
            </form>
            @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection