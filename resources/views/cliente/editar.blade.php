@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{route('cliente.index')}}">Clientes </a></li>
                    <li class="active"> / Editar</li>
                </ol>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>

            <div class="container">
                <form action=" {{ route('cliente.atualizar', $id->id) }}" method = "post">
                    {{ @csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="nome"> Nome </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{$id->nome}}" placeholder="Digite seu nome ...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name = "email" id="email" value="{{$id->email}}" placeholder="Seu E-mail">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" value="{{$id->endereco}}" placeholder="Seu endereço">
                    </div>
                    <button class="btn btn-info"> Atualizar </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection