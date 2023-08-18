<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento; // Importa o modelo 'Evento' para usar no controller

class agendaController extends Controller
{
    public function agenda(Request $request){
        return view('site.agenda'); // Retorna a visualização 'site.agenda'
    }

    public function salvar(Request $request){
        // Cria uma nova instância do modelo 'Evento'
        $agenda = new Evento();

        // Preenche os atributos do modelo com dados do formulário enviado via $request
        $agenda->titulo = $request->input('nomeDoEvento');
        $agenda->descricao = $request->input('descricao');
        $agenda->data_inicial = $request->input('iniciodata');
        $agenda->data_final = $request->input('fimdata');
        $agenda->cliente = $request->input('cliente');

        // Salva os dados do evento no banco de dados
        $agenda->save();

        // Retorna a visualização 'site.agenda'
        return view('site.agenda');
    }
}
