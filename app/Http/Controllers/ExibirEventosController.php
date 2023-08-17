<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class ExibirEventosController extends Controller
{
    public function agendamentosFuturos(){
        //var_dump($_GET);
        return view('site.agendamentosFuturos');
    }
    public function agendamentosAnteriores(){
        //var_dump($_GET);
        return view('site.agendamentosAnteriores');
    }

    public function todosOsAgendamentos(){
        $findEvento = Evento::all();
        return view('site.todosOsAgendamentos',compact('findEvento'));
    }
}
