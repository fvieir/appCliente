@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Clientes</h2> 
                </div>

                <div class="card-body">
                        <a class="btn btn-success" href="#">Cadastrar</a>
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
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Enderenço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                    @foreach($clientes as $cliente)
                        <tr>
                            <th scope="row">{{$cliente->id}}</th>
                            <th>{{$cliente->nome}}</th>
                            <th>{{$cliente->email}}</th>
                            <th>{{$cliente->endereco}}</th>
                            <th>
                                <a class="btn btn-primary" href="#">Editar</a>
                                <a class="btn btn-danger" href="#">Deletar</a>
                            </th>
                        </tr>
                    @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="align-self-center">
                    {!! $clientes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection