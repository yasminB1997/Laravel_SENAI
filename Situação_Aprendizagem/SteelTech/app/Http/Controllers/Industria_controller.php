<?php

namespace App\Http\Controllers;
use App\Models\Industria;

use Illuminate\Http\Request;

class IndustriaController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'materia' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0',
            'dataFabricacao' => 'required|date',
            'preco' => 'required|numeric|min:0',
        ]);

        Industria::create([
            'nomeProduto' => $request->nomeProduto,
            'materia' => $request->materia,
            'quantidade' => $request->quantidade,
            'dataFabricacao' => $request->dataFabricacao,
            'preco' => $request->preco
        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function listar(Request $request){
        try{
        $query = Industria::query();

if($request->filled('nomeProduto')){
            $query->where('nomeProduto', 'like', '%'.$request->nomeProduto .'%');
        }
  if($request->filled('dataFabricacao')){
            $query->whereDate('dataFabricacao', $request->dataFabricacao);
        }
 if($request->filled('materia')){
            $query->where('materia', 'like', '%'.$request->materia .'%');
        }

$Industria = $query->get();
 return view('listar', compact('Industria'));

       } catch(\Exception $e){
            return response()->json([
                'Industria' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);
        }
    }
   
}