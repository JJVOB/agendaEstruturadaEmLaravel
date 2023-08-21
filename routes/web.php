
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\agendaController;
use App\Http\Controllers\AgendamentosAnterioresController;
use App\Http\Controllers\AgendamentosFuturosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ExibirEventosController;

use App\Evento; // Importa o modelo 'Evento'

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
    Route::post('/cadastraEvento',[\App\Http\Controllers\agendaController::class,'cadastraEvento'])->name('site.cadastraEventos');

    //edit
    Route::get('/evento/editar/{id}', 'EventosController@editar')->name('site.editar');
    Route::put('/evento/editar/{id}', 'EventosController@update')->name('evento.update');
    
    Route::get('/eventos', [\App\Http\Controllers\EventosController::class,'pesquisar'])->name('site.pesquisar');

    Route::delete('/evento/delete/{id}', 'EventosController@delete')->name('site.delete');
});

// Rota de fallback (caso a página não seja encontrada)
Route::fallback(function(){
    echo 'Página não encontrada!! <br> <a href="'.route('site.index').'" >Clique aqui</a> para ser redirecionado.';
});
