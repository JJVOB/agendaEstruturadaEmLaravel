<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class ExibirEventosController extends Controller
{
    public function agendamentos()
    {
        //var_dump($_GET);
        return view('site.agendamentos');
    }

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function evento(Request $request)
    {
        dd($request);

        $pesquisar = $request->pesquisar;
        $findEvento = $this->evento->getProdutosPesquisar($pesquisar ?? '');

        return view('site.agendamentos', compact('$findEvento'));
    }
}
