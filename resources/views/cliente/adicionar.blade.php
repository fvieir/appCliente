@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <ol>
                        <a href="{{route('cliente.index')}}">Cliente </a>
                        / Adicionar
                    </ol>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>

            <div class="container">
                @if(Session::has('messageEditar'))
                <div class="{{ Session::get('messageEditar')['class']}}">
                    {{Session::get('messageEditar')['msg']}}
                </div>
                @endif
                <form action=" {{ route('cliente.salvar') }}" method = "post">
                    {{ @csrf_field() }}
                    <div class="form-group">
                        <label for="nome"> Nome </label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome ...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name = "email" id="email" placeholder="Seu E-mail">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Seu endereço">
                    </div>
                    <button class="btn btn-info"> Adicionar </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection