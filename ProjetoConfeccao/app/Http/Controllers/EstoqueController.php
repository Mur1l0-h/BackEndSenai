<?php

namespace App\Http\Controllers;

use \App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index(){
        $estoque = Estoque::all();
        return view('estoque.index', compact('estoque'));
    }

    public function create(){
        return view('estoque.create');
    }
    public function store(Request $request){
        $request->mergeIfMissing([
            'produto_id' => 1
        ]);

    $request->validate([
        'preco' => 'required|decimal:0,2',
        'quantidade' => 'required|integer',
        'produto_id' => 'required|integer'
        ]);

        Estoque::create($request->all());
        return redirect()->route('estoque.index')->with('success', 'Estoque atualizado com sucesso');
    }
    public function edit(Estoque $estoque){
        return view('estoque.edit', compact('estoque'));
    }

      public function update(Request $request, Estoque $estoque){
        $request->mergeIfMissing([
            'produto_id' => 1
        ]);

      $request->validate([
        'preco' => 'required|decimal:0,2',
        'quantidade' => 'required|integer',
        'produto_id' => 'required|integer'
        ]);

        $estoque->update($request->all());
        return redirect()->route('estoque.index')->with('success', 'Estoque alterado com sucesso!');
    }

    public function destroy(Estoque $estoque){
        $estoque->delete();
        return redirect()->route('estoque.index')->with('success', 'Estoque excluído com sucesso!');
    }
}
