<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoWebController;

Route::get('/', [ProdutoWebController::class, 'index'])->name('produtos.index');
Route::get('/produtos/criar', [ProdutoWebController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoWebController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{id}/editar', [ProdutoWebController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProdutoWebController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{id}', [ProdutoWebController::class, 'destroy'])->name('produtos.destroy');



