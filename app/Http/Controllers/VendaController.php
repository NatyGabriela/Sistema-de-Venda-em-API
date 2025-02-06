<?php

namespace App\Http\Controllers;

use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
   public function store(Request $request){
    $venda= Venda::create([
        'cliente_id'=>$request->cliente_id,
        'data_venda'=>date('Y-m-d H:i:s'),
        'subtotal'=>0,
        'desconto'=>$request->desconto,
        'total'=>0
    ]);

    $subtotal =0;
    foreach ($request->itens as $item){
        $subtotal += $item["quantidade"] * $item["preco_unitario"];


        $produto = Produto::find($item['produto_id']);
        $produto->quantidade_estoque = $produto->quantidade_estoque - $item["quantidade"];

        $item_venda = ItemVenda::create([
            'venda_id' => $venda->id,
            'produto_id' =>$item['produto_id'],
            'quantidade'=>$item['quantidade'],
            'preco_unitario'=>$item['preco_unitario'],
            'subtotal_item'=>$subtotal
        ]);

        $produto->upadte();
    }

     $venda->subtotal = $subtotal;
     $venda->total = $subtotal - $request->desconto;
     $venda->update();    


 return response()->json([
    'status'=> true,
    'message'=> 'cliente cadastrado',
    'data'=> $venda
 ]);






   }
}

