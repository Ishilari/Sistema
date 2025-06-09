<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ContasPagarController;
use App\Http\Controllers\TipoDespesaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('compra.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('fornecedor', FornecedorController::class);
    Route::resource('compra', CompraController::class);
    Route::resource('contas-pagar', ContasPagarController::class);
    Route::resource('tipo-despesa', TipoDespesaController::class);
});

require __DIR__.'/auth.php';
