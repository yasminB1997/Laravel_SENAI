<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller{

    public function listarEditora(){
        $editoras = Editora::all(); 
        return view('listarEditora', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nomeEd' => 'required|string|max:255',
            'cnpj' => 'required|numeric|',
            'cidade' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            
        ]);

        Editora::create([
            'nomeEd' => $request->nomeEd,
            'cnpj' => $request->cnpj,
            'cidade' => $request->cidade,
            'pais' => $request->pais,
            
            
        ]);

        return redirect()->back()->with('success','Editora cadastrada com exito :)!');
    }
}