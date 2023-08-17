<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\agendaController;
use App\Http\Controllers\AgendamentosAnterioresController;
use App\Http\Controllers\AgendamentosFuturosController;
use App\Http\Controllers\PrincipalController;
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



Route::prefix('agenda')->group(function (){
    Route::get('/agenda',[\App\Http\Controllers\agendaController::class,'agenda'])->name('site.agenda');
    Route::post('/agenda',[\App\Http\Controllers\agendaController::class,'salvar'])->name('site.salvar');
    Route::delete('/deletar',[\App\Http\Controllers\agendaController::class,'deletar'])->name('site.delete');
    
});

Route::prefix('exibir')->group(function (){

    Route::get('/agendamentosAnteriores',[\App\Http\Controllers\ExibirEventosController::class,'agendamentosAnteriores'])->name('site.agendamentosAnteriores');
    Route::post('/agendamentosAnteriores',[\App\Http\Controllers\ExibirEventosController::class,'agendamentosAnteriores'])->name('site.agendamentosAnteriores');
    
    Route::get('/agendamentosFuturos',[\App\Http\Controllers\ExibirEventosController::class,'agendamentosFuturos'])->name('site.agendamentosFuturos');
    Route::post('/agendamentosFuturos',[\App\Http\Controllers\ExibirEventosController::class,'agendamentosFuturos'])->name('site.agendamentosFuturos');
    
    Route::get('/todosOsAgendamentos',[\App\Http\Controllers\ExibirEventosController::class,'todosOsAgendamentos'])->name('site.todosOsAgendamentos');
    Route::post('/todosOsAgendamentos',[\App\Http\Controllers\ExibirEventosController::class,'todosOsAgendamentos'])->name('site.todosOsAgendamentos');
});




/* Caso a pagina não seja encontrada */
Route::fallback(function(){

    echo 'Página não entrada!! <br> <a href="'.route('site.index').'" >Clique aqui </a> para ser redirecionado.';

});
