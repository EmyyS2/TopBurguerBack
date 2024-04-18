<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrinhoRequest;
use App\Models\Carrinho;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = Carrinho::all();
        return [
            'cliente_id' => $carrinho->cliente_id,
            'produto_id' => $carrinho->produto_id,
            'status' => $carrinho->status,
            'total'=>$carrinho->total
        ];
    }
    public function store(CarrinhoRequest $request){
        $carrinho = Carrinho::where('clientes_id', $request->clientes_id);
        if(!$carrinho){
            return response()->Json([
                "status"=>false,
                "message"=> "cliente não encontrado"
            ], 400);
        }
            $carrinho = Carrinho::create([
                'status'=>$request->status,
                'clientes_id'=>$request->cliente_id,
                'total'=>$request->total,
            ]);
            return response()->json([
                "status"=>true,
                "message"=>"pedido feito com sucesso",
                "data"=>$carrinho
            ], 200);
    }
        public function editar(Request $request)
        {
            $carrinho-Carrinho::find($request->id);
            if (!isset($carrinho)){
                return response()->json([
                    'status'=>false,
                    'message'=>"Pedido não encontrado"
                ]);
            }
            if (isset($request->clientes_id)) {
                $carrinho->clientes_id = $request->clientes_id;
            }
            if (isset($request->produtos_id)) {
                $carrinho->produtos_id = $request->produtos_id;
            }
            if (isset($request->status)) {
                $carrinho->status = $request->status;
            }
            if (isset($request->total)) {
                $carrinho->total = $request->total;
            }
            $carrinho->update();
            return response()->json([
                "status"=>false,
                "message"=>"Pedido não encontrado"
            ], 400);
        
        $carrinho =  Item_carrinho::create([


            'quantidade' => $request->quantidade,
            'pedidos_id' => $request->pedidos_id,
            'produtos_id' => $request->produtos_id,
            'valor_unitario' => $request->valor_unitario,
        ]);
        return response()->json([
            "status" => true,
            "message" => "pedido feito com sucesso",
            "data" => $carrinho

        ], 200);
}  
} 
