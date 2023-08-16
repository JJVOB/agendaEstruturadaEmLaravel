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

Route::post('/agendarEvento',[\App\Http\Controllers\agendarEventoController::class,'agendarEvento'])->name('site.agendarEvento');

Route::get('/agenda',[\App\Http\Controllers\agendaController::class,'agenda'])->name('site.agenda');
Route::post('/agenda',[\App\Http\Controllers\agendaController::class,'salvar'])->name('site.agenda');

Route::post('/agenda',[\App\Http\Controllers\agendaController::class,'deletar'])->name('site.delete');




Route::get('/agendamentosAnteriores',[\App\Http\Controllers\AgendamentosAnterioresController::class,'agendamentosAnteriores'])->name('site.agendamentosAnteriores');
Route::post('/agendamentosAnteriores',[\App\Http\Controllers\AgendamentosAnterioresController::class,'agendamentosAnteriores'])->name('site.agendamentosAnteriores');

Route::get('/agendamentosFuturos',[\App\Http\Controllers\AgendamentosFuturosController::class,'agendamentosFuturos'])->name('site.agendamentosFuturos');
Route::post('/agendamentosFuturos',[\App\Http\Controllers\AgendamentosFuturosController::class,'agendamentosFuturos'])->name('site.agendamentosFuturos');

//Route::post('/deleteEvento',[\App\Http\Controllers\deleteController::class,'deletar'])->name('site.delete');





/* Caso a pagina não seja encontrada */
Route::fallback(function(){

    echo 'Página não entrada!! <br> <a href="'.route('site.index').'" >Clique aqui </a> para ser redirecionado.';

});
