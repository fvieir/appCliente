@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <ol class="breadcrumb panel-heading">                    
                    <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="active">/ Detalhe</li>
                </ol>

                <div class="card-body">
                       <p>Nome: {{ $clientes->nome }}</p>
                       <p>Email: {{ $clientes->email }}</p>
                       <p>Enderenço: {{ $clientes->endereco }}</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="row">Id</th>
                                <th>Tipo</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($clientes->telefones as $telefone)
                        <tr>
                            <th scope="row">{{ $telefone->id }}</th>
                            <th>{{ $telefone->titulo }}</th>
                            <th>{{ $telefone->telefone }}</th>
                            <th>
                                <a class="btn btn-outline-primary" href="{{ route('telefone.editar' , $telefone->id) }}">Editar</a>
                                <a class="btn btn-outline-danger"  href="javascript:(confirm('Deseja Deletar') ? # : false)">Deletar</a>
                            </th>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>

                    <div>
                        <a class="btn btn-outline-info" href=" {{ route('telefone.adicionar' , $clientes->id) }} "> Cadastrar Telefone </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection