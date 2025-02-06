<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFormRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(ProdutoFormRequest $request){
        $produto =Produto::create([
         'nome'=> $request->nome,
         'codigo'=>$request->codigo,
         'preco'=>$request->preco,
         'quantidade_estoque'=>$request->quantidade_estoque
        ]);

        return response()->json([
            'status'=> true,
            'message'=> 'produto cadastrado',
            'data'=> $produto
        ]);
    }

    public function index(){
        $produto=Produto::get()->all();

        return response()->json([
            'status'=>true,
            'data'=>$produto
        ]);

    }
  
    public function findByid($id){
        $cliente=Produto::find($id);

        
        return response()->json([
            'status'=> true,
            'message'=>'produto encontrado',
            'data'=> $cliente
        ]); 
}

public function update(ProdutoFormRequest $request) 
{ 
    $produto = Produto::find($request->id); 


    if ($produto == null) { 
        return response()->json([ 
            'status' => false, 
            'message' => 'Id não encontrado' 
        ]); 
    } 


    if (isset($request->nome)) { 
        $produto->nome = $request->nome; 
    } 


    if (isset($request->codigo)) { 
        $produto->codigo = $request->codigo; 
    } 


    if (isset($request->preco)) { 
        $produto->preco = $request->preco; 
    } 

    if (isset($request->quantidade_estoque)) { 
        $produto->quantidade_estoque = $request->quantidade_estoque; 
    } 


    $produto->update(); 


    return response()->json([ 
        'status' => true, 
        'message' => 'Atualizado com sucesso' 
    ]); 
} 


public function delete($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'status' => false,
                'message' => 'não encontrado'
            ]);
        }

        $produto->delete();

        return response()->json([
            'status' => true,
            'message' => 'produto excluído com sucesso',
            'data' => $produto
        ]);
    }

}
