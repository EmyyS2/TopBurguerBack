<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
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
}
