<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class EditoraController extends Controller{
    public function listarEditora(){
        $editoras= Editora::all();
        return view ('ListarEditora', compact('editoras'));
    }

    public function add(Request $request){
        $request->validate([
            'nome'=> 'required|string|max:255',
            'cnpj'=> 'required|numeric|max:255',
            'país'=> 'required|numeric|max:255',
            'cidade'=> 'required|numeric|max:255',
        ]);

        Editora::create([
            'nome'=> $request->nome,
            'cnpj'=> $Request->cnpj,
            'país'=>$request->pais, 
            'cidade'=> $required->cidade,
        ]);

        return redirect()->back()->with('sucess', 'Editora cadastrada com exito!');
    }
}

