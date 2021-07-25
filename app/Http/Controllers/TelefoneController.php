<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adicionar($id)
    {
        $cliente = \App\Cliente::find($id);
        return view('telefone.adicionar' , \compact('cliente'));
    }

    public function salvar(Request $request, $id)
    {
        $telefone = new \App\Telefone;
        $telefone->titulo = $request->input('titulo');
        $telefone->telefone = $request->input('telefone');

        \App\Cliente::find($id)->addTelefone($telefone);

        \Session::flash('message', [
            'msg' => "Telefone cadastrado com suscesso.",
            'class' => "alert alert-success"
        ]);

        return \redirect()->route('cliente.detalhe' , $id);
    }

    public function editar($id)
    {
        $telefone = \App\Telefone::find($id);
        return view('telefone.editar',\compact('telefone'));
    }

    public function atualizar(Request $request, $id)
    {
        $telefone = \App\Telefone::find($id);
        $telefone->update($request->all());

        \Session::flash('message',[
            'msg' => "Telefone atualizado com sucesso",
            'class' => "alert alert-success"
        ]);

        return \redirect()->route('cliente.detalhe',$telefone->cliente_id);
       
    }

    public function deletar($id)
    {
        $telefone = \App\Telefone::find($id);
        $telefone->delete($id);

        \Session::flash('message',[
            'msg' => "Deletado com sucesso",
            'class' => "alert alert-success"
        ]);

        return \redirect()->route('cliente.detalhe' , $telefone->cliente_id);
    }
}
