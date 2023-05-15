<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentosController;
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

// Rota para enviar um método para o AgendamentosController para fazer o método post
Route::post('/cadastrar', [AgendamentosController::class, 'store'])->name('agendamentos.store');

// Rota para acessar a página de cadastrar
Route::get('/', function () {
    return view('index');
})->name('index');

// Rota para enviar um método para o AgendamentosController para fazer o método get para a tabela
Route::get('/consulta', [AgendamentosController::class, 'show'])->name('agendamentos.show');

// Rota para enviar um método para o AgendamentosController para fazer o método delete para a tabela
Route::delete('/excluir/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos.destroy');

// Rota para enviar um método para o AgendamentosController para fazer o método de editar os dados da tabela
Route::get('/editar{id}', [AgendamentosController::class, 'edit'])->name('agendamentos.edit');

// Rota para enviar um método para o AgendamentosController para fazer o update (atualização) dos dados da tabela enviados pelos "edit".
Route::put('/atualizar/{id}', [AgendamentosController::class, 'update'])->name('agendamentos.update');


