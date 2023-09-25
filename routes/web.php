<?php

use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pessoas/lista', [PessoasController::class, 'list'])->name('pessoa.index');
    Route::get('/pessoas', [PessoasController::class, 'index'])->name('pessoa.new');
    Route::get('/pessoas/{pessoa}/edit', [PessoasController::class, 'edit'])->name('pessoa.edit');
    Route::delete('/pessoas/{pessoa}', [PessoasController::class, 'destroy'])->name('pessoa.destroy');
    Route::post('/pessoas', [PessoasController::class, 'create'])->name('pessoa.create');

    Route::get('/equipamentos/lista', [EquipamentosController::class, 'list'])->name('equipamento.index');
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamento.new');
    Route::post('/equipamentos', [EquipamentosController::class, 'create'])->name('equipamento.create');
    Route::get('/equipamentos/{equipamento}/edit', [EquipamentosController::class, 'edit'])->name('equipamento.edit');
    Route::delete('/equipamentos/{equipamento}', [EquipamentosController::class, 'destroy'])->name('equipamento.destroy');
});

require __DIR__.'/auth.php';
