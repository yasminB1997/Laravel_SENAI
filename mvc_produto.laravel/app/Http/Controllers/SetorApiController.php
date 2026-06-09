<?php
// estou no SetorApiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_setor
        ]);

        return response()->json([
            'message' => 'Setor Criado',
            'setor' => $setor
        ], 200);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
           'num_setor' => ' required|numeric|max:255'
            // para poder ser nulo ou existir na tabela setores
        ]);

        $setor = Setores::findOrFail($id); // buscar setor para ser atualizado
  

        $setor->nome = $request->nome; // atualizando o campo nome
        $setor->num_setor = $request->num_setor; // atualizando o campo quantidade

        $setor->save(); // salvando no banco de dados(fazendo update)




        return response()->json([
            'message'=> 'setor atualizado!',
            'setor'=> $setor,
        ],200);


}

    public function deletarApi($id){
        $setor = Setores::findOrFail($id); // buscar o produto para depois deletar
        $produto->delete(); 

          return redirect()->json([
            'message'=> "Setor Deletado com Sucesso!"
          ],200);
}