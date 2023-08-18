<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class ExibirEventosController extends Controller
{
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function evento(Request $request)
    {
        //dd($request);

        $pesquisar = $request->pesquisar;
        $Evento = new Evento(); // instância do modelo Evento
        $findEvento = $Evento->buscarEventos('search', $pesquisar ?? '');

        return view('site.agendamentos', compact('findEvento'));
    }

    public function agendamentos()
    {
        //var_dump($_GET);
        return view('site.agendamentos');
    }

}
