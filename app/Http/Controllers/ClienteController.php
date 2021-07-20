<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

   public function index()
   {
       $clientes = Cliente::paginate(10);
       return view('cliente.index',compact('clientes'));
   }

   public function adicionar()
   {
       return view('cliente.adicionar');
   }

   public function salvar(Request $request)
   {
        \App\Cliente::create($request->all());

        \Session::flash('message',[
            'msg' => "Cliente cadastrado com sucesso!",
            'class' => "alert alert-success",
            'role' => "alert"
        ]);

        return redirect()->route('cliente.adicionar');
   }

   public function editar ($id)
   {
        $id = \App\Cliente::find($id);

        if (!$id)
        {
            \Session::flash('messageEditar',[
                'msg' => "Cliente não cadastrado. Deseja cadastrar ?",
                'class' => "alert alert-danger"
            ]);

            return \redirect()->route('cliente.adicionar');
        }
            return view('cliente.editar', \compact('id'));
   }

   public function atualizar (Request $request, $id)
   {
       \App\Cliente::find($id)->update($request->all());

        \Session::flash('messageUpdate',[
            'msg' => "Cliente atualizado com sucesso",
            'class' => "alert alert-success"
        ]);

       return redirect()->route('cliente.index');
   }
}
