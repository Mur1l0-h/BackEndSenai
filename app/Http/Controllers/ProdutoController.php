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

}
