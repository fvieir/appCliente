@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Clientes</li>
                </ol>
                <div class="card-body">
                        <a class="btn btn-info" href="{{route('cliente.adicionar')}}">Adicionar</a>
                </div>

                @if(Session::has('messageUpdate'))
                    <div class="{{ Session::get('messageUpdate')['class'] }}">
                        {{ Session::get('messageUpdate')['msg'] }}
                    </div>
                @endif

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
                                <a class="btn btn-primary" href="{{ route('cliente.editar',$cliente->id) }}">Editar</a>
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