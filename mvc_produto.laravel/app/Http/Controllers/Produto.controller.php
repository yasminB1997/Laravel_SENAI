<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setor;
use App\Models\DetalheProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller{

    public function listar(){
        $produtos = Produto::with(['setor','detalhe'])->get();
        return view('listar', compact('produtos'));
    }

    public function create(){
        $setores = Setor::all();
        return view('cadastro', compact('setores'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'peso' => 'required|numeric|max:255',
            'setor_id' => 'required|exists:setores,id',
            'preco' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'tamanho' => 'required|string|max:255',
            
        ]);

        $detalhe = DetalheProduto::create([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso,
        ]);

        Produto::create([
            'nome' => $request->nome,
             'preco' => $request->preco,
            'setor_id' => $request->setor_id,
            'detalhes_id' => $detalhe->id,
            'quantidade' => $request->quantidade
           
        ]);

        return redirect()->back()->with('success','Produto cadastrado com sucesso!');
    }

    public function atualizar($id){
        $produto = Produto::with('detalhe')->findOrFail($id);
        $setores = Setor::all();
        return view('atualizar', compact('produto','setores'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|string|max:255',
            'tamanho' => 'required|string|max:255',
            'peso' => 'required|numeric|max:255',
             'preco' => 'required|string|max:255',
            'descricao' => 'required|string|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            
        ]);

      
        $produto->detalhe->update([
            'descricao' => $request->descricao,
            'peso' => $request->peso,
             'tamanho' => $request->tamanho,
        ]);

        return redirect()->back()->with('success','Produto atualizado com exito!');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.listar')->with('success','Produto excluído com exito!');
    }
}