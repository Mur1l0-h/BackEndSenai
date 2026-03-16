<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

// Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
// Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque.index');
// Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
// Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor.index');
// Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido.index');


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

// Route::get('/clientes/create', [ClienteController::class , 'create'])->name('clientes.create');
// Route::get('/clientes/edit', [ClienteController::class , 'edit'])->name('clientes.edit');
// Route::post('/clientes', [ClienteController::class , 'store'])->name('clientes.store');
// Route::get('/clientes/edit', [ClienteController::class , 'edit'])->name('clientes.edit');
// Route::post('/clientes', [ClienteController::class , 'store'])->name('clientes.store');


Route::resources([
    'clientes' => ClienteController::class,
    'estoque' => EstoqueController::class,
    'produto' => ProdutoController::class,
    'fornecedor' => FornecedorController::class,
    'pedido' => PedidoController::class,
]);


require __DIR__.'/auth.php';
