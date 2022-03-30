@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Relatoritórios Financeiros</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Receitas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dados["receita"]}}</div>
                        </div>
                        <div class="col-auto">
                            <a  href=""> <i class="fa fa-archive fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Valor a Receber</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dados["aberto"]}}</div>
                        </div>
                        <div class="col-auto">
                            <a  href=""> <i class="fa fa-plus-circle fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Atrasados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dados["atrasado"]}}</div>
                        </div>
                        <div class="col-auto">
                            <a  href=""> <i class="fa fa-minus-circle fa-2x text-gray-300"></i></a>
                        </div>
                  </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
