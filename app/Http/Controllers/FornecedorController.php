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
}
