@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <ol>
                        <a href="{{route('cliente.index')}}">Cliente </a>
                    
                        / Editar
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
                <form action=" {{ route('telefone.atualizar' , $telefone->id) }}" method = "post">
                    {{ @csrf_field() }}
    
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name = "titulo" id="titulo" value="{{$telefone->titulo}}" placeholder="Titulo do Telefone">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{$telefone->telefone}}" placeholder="Nº do Telefone">
                    </div>
                    <button class="btn btn-info"> Atualizar </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection