<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');
Route::get('/cadastro',[\App\Http\Controllers\CadastroController::class,'cadastro'])->name('site.cadastro');
Route::get('/cadastrarAgendamento',[\App\Http\Controllers\CadastrarAgendamentoController::class,'cadastrarAgendamento'])->name('site.cadastrarAgendamento');
Route::get('/agendamentosAnteriores',[\App\Http\Controllers\AgendamentosAnterioresController::class,'agendamentosAnteriores'])->name('site.agendamentosAnteriores');
Route::get('/agendamentosFuturos',[\App\Http\Controllers\AgendamentosFuturosController::class,'agendamentosFuturos'])->name('site.agendamentosFuturos');



/* Caso a pagina não seja encontrada */
Route::fallback(function(){

    echo 'Página não entrada!! <br> <a href="'.route('site.index').'" >Clique aqui </a> para ser redirecionado.';

});
