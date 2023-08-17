<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class agendaController extends Controller
{
    public function agenda(Request $request){
       // dd($request);
       /*
       $agenda = new Evento();
        
        $agenda = new Evento();
        $agenda->titulo = $request->input('nomeDoEvento');
        $agenda->descricao = $request->input('descricao');
        $agenda->data_inicial = $request->input('iniciodata');
        $agenda->data_final = $request->input('fimdata');
        $agenda->cliente = $request->input('cliente');

        $agenda->save();
        
        /*
        $agenda->fill($request->all());
        $agenda->save();
        */

        return view('site.agenda');
    }

    public function salvar(Request $request){
    
        $agenda = new Evento();
        $agenda->titulo = $request->input('nomeDoEvento');
        $agenda->descricao = $request->input('descricao');
        $agenda->data_inicial = $request->input('iniciodata');
        $agenda->data_final = $request->input('fimdata');
        $agenda->cliente = $request->input('cliente');

        $agenda->save();
        return view('site.agenda');
    }





    
}
