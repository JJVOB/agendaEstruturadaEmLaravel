<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class EventosController extends Controller
{
    public function evento(Request $request)
    {
        $pesquisar = $request->pesquisar;
        
        $Evento = new Evento();
        
        $findEvento = $Evento->buscarEventos($pesquisar ?? '');
        
        return view('site.agendamentos', compact('findEvento'));
    }

    public function pesquisar(Request $request)
    {
        $pesquisa = $request->input('pesquisa');
        
        $eventos = Evento::where('titulo', 'LIKE', "%$pesquisa%")
            ->orWhere('descricao', 'LIKE', "%$pesquisa%")
            ->get();
            
        return view('site.pesquisar', ['eventos' => $eventos]);
    }

    public function editar($id)
    {
        $evento = Evento::find($id);
        return view('site.editar', ['evento' => $evento]);
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return redirect()->back()->with('error', 'Evento não encontrado.');
        }

        $evento->titulo = $request->input('titulo');
        $evento->descricao = $request->input('descricao');
        // Atualizar outros campos

        $evento->save();

        return redirect()->route('site.editar', ['id' => $id])->with('success', 'Evento atualizado com sucesso.');
    }

    public function delete($id)
    {
        try {
            $evento = Evento::find($id);

            if (!$evento) {
                return redirect()->back()->with('error', 'Evento não encontrado.');
            }

            $evento->delete();

            return redirect()->back()->with('success', 'Evento excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o evento.');
        }
        return view('site.delete');
    }

    public function agendamentos()
    {
        return view('site.agendamentos');
    }
}
