<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Evento; // Importa o modelo 'Evento' para usar no controller

class agendaController extends Controller
{
    public function agenda(Request $request)
    {
        return view('site.agenda'); // Retorna a visualização 'site.agenda'
    }

    public function teste(Request $request)
    {
        return view('site.teste'); // Retorna a visualização 'site.agenda'
    }

    public function cadastraEvento(Request $request)
    {
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
        return redirect()->back()->with('success', 'Evento cadastrado com sucesso.');
        // Retorna a visualização 'site.agenda'
        return  view('site.agenda');
    }

}
