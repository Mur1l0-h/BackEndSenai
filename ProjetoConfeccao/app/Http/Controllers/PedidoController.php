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

    public function store(Request $request){
    
    $id_pedido = rand();

     $request->mergeIfMissing([
        'clientes_id' => 1,
        'fornecedor_id' => 1,
        'id_pedido'=> $id_pedido,
    ]);
    
    $request->validate([
            'quantidade' => 'required|integer',
            'valor' => 'required|decimal:0,2',
            'clientes_id' => 'required|integer',
            'fornecedors_id' => 'required|integer',
            'id_pedido' => 'required|integer',
        ]);
        Pedidos::create($request->all());
        return redirect()->route('pedido.index')->with('success', 'Novo pedido registrado!');
    }
    public function create(){
        return view('pedido.create');
    }

    public function edit(Pedidos $pedido){
        return view('pedido.edit', compact('pedido'));
    }

    public function update(Request $request, Pedidos $pedido){
        $request->mergeIfMissing([
        'clientes_id' => 1,
        'fornecedor_id' => 1,
        'id_pedido'=> random_int()
    ]);
    
    $request->validate([
            'quantidade' => 'required|integer',
            'valor' => 'required|decimal:0,2',
            'clientes_id' => 'required|integer',
            'fornecedors_id' => 'required|integer',
            'id_pedido' => 'required|integer',
        ]);

        $pedido->update($request->all());
        return redirect()->route('pedido.index')->with('success', 'Pedido alterado!');
    }

    public function destroy(Pedidos $pedido){
        $pedido->delete();
         return redirect()->route('pedido.index')->with('success', 'Pedido excluído!');
    }
}
