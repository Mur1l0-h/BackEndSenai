<?php

namespace App\Http\Controllers;

use \App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index(){
        $pedidos = Pedidos::all();
        return view('pedido.index', compact('pedidos'));
    }
    public function edit(){
        
    }
    public function store(Request $request){
    
    $request->mergeIfMissing([
        'clientes_id' => 1,
        'fornecedor_id' => 1
    ]);
    
    $request->validate([
            'quantidade' => 'required|integer',
            'valor' => 'required|decimal:0,2',
            'clientes_id' => 'required|integer',
            'fornecedor_id' => 'required|integer'
        ]);

        Pedidos::create($request->all());
        return redirect()->route('pedido.index')->with('success', 'Novo pedido registrado!');
    }
    public function create(){
        return view('pedido.create');
    }
}
