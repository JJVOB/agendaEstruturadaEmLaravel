<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\agendaController;
use App\Http\Controllers\AgendamentosAnterioresController;
use App\Http\Controllers\AgendamentosFuturosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ExibirEventosController;

use App\Evento;


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

Route::prefix('dashboard')->group(function () {
    Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');
});

Route::prefix('agenda')->group(function () {

    //cadastro
    Route::get('/cadastraEvento',[\App\Http\Controllers\agendaController::class,'agenda'])->name('site.agenda');
    Route::post('/cadastraEvento',[\App\Http\Controllers\agendaController::class,'cadastraEvento'])->name('cadastro.evento');

    //edit
    Route::get('/atualizarEvento{id}',[\App\Http\Controllers\agendaController::class,'atualizarEvento'])->name('atualizar.evento');
    Route::put('/atualizarEvento{id}',[\App\Http\Controllers\agendaController::class,'atualizarEvento'])->name('atualizarevento.evento');

    Route::delete('/delete',[\App\Http\Controllers\agendaController::class,'delete'])->name('evento.delete');        
   
    Route::get('/agendamentos',[\App\Http\Controllers\agendaController::class,'pesquisarEvento'])->name('site.eventos');
    Route::get('/teste',[\App\Http\Controllers\agendaController::class,'teste'])->name('site.teste');


});







/* Caso a pagina não seja encontrada */
Route::fallback(function(){

    echo 'Página não entrada!! <br> <a href="'.route('site.index').'" >Clique aqui </a> para ser redirecionado.';

});
