<?php

namespace App\Http\Controllers;

use \App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index(){
    $produto = Produto::all();
    return view('produtos.index', compact('produto'));
    }

    public function edit(Produto $produto){
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto){
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|decimal:0,2',
        ]);

        $produto->update($request->all());
        return redirect()->route('produto.index')->with('success', 'Produto alterado com sucesso!');
    }

    public function destroy(Produto $produto){
        $produto->delete();
        return redirect()->route("produto.index")->with('success', 'Produto excluído com sucesso!');
    }

    public function create(){
        return view('produtos.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|decimal:0,2',
        ]);

        Produto::create($request->all());
        return redirect()->route('produto.index')->with("success", "Produto registrado com sucesso");
    }

}
