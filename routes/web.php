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

// Rota inicial
Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');

// Grupo de rotas para o prefixo 'agenda'
Route::prefix('agenda')->group(function (){
    Route::get('/agenda',[\App\Http\Controllers\agendaController::class,'agenda'])->name('site.agenda');
    Route::post('/agenda',[\App\Http\Controllers\agendaController::class,'salvar'])->name('site.salvar');
    Route::delete('/delete',[\App\Http\Controllers\EventosController::class,'delete'])->name('site.delete');
    Route::get('/evento',[\App\Http\Controllers\EventosController::class,'evento'])->name('site.ev');
    Route::get('/evento',[\App\Http\Controllers\EventosController::class,'evento'])->name('site.eventos'); // Correção: duplicação do nome da rota
});

// Grupo de rotas para o prefixo 'exibir'
Route::prefix('exibir')->group(function (){
    // As rotas dentro desse grupo estão comentadas, você pode descomentá-las e configurá-las conforme necessário.
});

// Rota de fallback (caso a página não seja encontrada)
Route::fallback(function(){
    echo 'Página não encontrada!! <br> <a href="'.route('site.index').'" >Clique aqui</a> para ser redirecionado.';
});
