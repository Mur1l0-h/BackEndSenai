<?php

namespace App\Http\Controllers;

use \App\Models\Fornecedors;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = Fornecedors::all();
        return view('fornecedor.index', compact('fornecedores'));
    }
    
    public function create(){
        return view('fornecedor.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max: 100',
            'endereco' => 'required|string|max: 255',
            'telefone' => 'required|integer'
        ]);

        Fornecedors::create($request->all());
        return redirect()->route('fornecedor.index')->with('success', "Fornecedor cadastrado com sucesso!");
    }
    public function edit(){

    }
    
}
