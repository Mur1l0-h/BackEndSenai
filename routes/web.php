<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor.index');
Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
