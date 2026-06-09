<?php

namespace App\Http\Controllers;
use App\Models\Industria;

use Illuminate\Http\Request;

class IndustriaApiController extends Controller
{
    public function listarApi(Request $request){
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

        $producoes = $query->get();

        return response()->json([
            'success' => true,
            'data' => $producoes
        ], 200);

       } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try{
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

            return response()->json([
                'success' => true,
                'message' => 'Produto Criado',
                'producao' => $producao
            ], 201);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' =>'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } 
    }

    public function updateApi(Request $request, $id){
        try{
            $request->validate([
                'nomeProduto' => 'required|string|max:255',
                'materia' => 'required|string|max:255',
                'quantidade' => 'required|numeric|min:0',
                 'dataFabricacao' => 'required|date',
                'preco' => 'required|numeric|min:0',
            ]);

            $producao = Producoes::findOrFail($id); //busca produção para ser atualizada

            $producao->nomeProduto = $request->nomeProduto;
            $producao->materia = $request->materia;
             $producao->quantidade = $request->quantidade;
            $producao->dataFabricacao = $request->dataFabricacao;
            $producao->preco = $request->preco;

            $producao->save(); // Salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "Produto Atualizado!",
                'producao' => $producao
            ], 200);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro na validação',
                'errors' => $e->errors()
            ], 422);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $producao = Producoes::findOrFail($id); // Buscar a produção pelo ID
            $producao->delete(); // Deletar a produção do banco de dados

            return response()->json([
                'message' => "Produto Deletado com Sucesso!",
                'producao' => $producao
            ], 200);
        }  catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        }
    }
}