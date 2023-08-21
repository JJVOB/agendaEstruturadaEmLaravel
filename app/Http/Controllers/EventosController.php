<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento; // Importa o modelo 'Evento' para usar no controller

class EventosController extends Controller
{

    public $evento;
    // Construtor do controlador, recebe uma instância do modelo 'Evento'
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    // Função para exibir eventos com possibilidade de busca
    public function evento(Request $request)
    {
        // Obtém o termo de pesquisa do formulário
        $pesquisar = $request->pesquisar;

        // Cria uma instância do modelo Evento
        $Evento = new Evento();

        // Chama o método 'buscarEventos' no modelo para procurar eventos com o termo de pesquisa
        $findEvento = $Evento->buscarEventos('search', $pesquisar ?? '');

        // Retorna a visualização 'site.agendamentos' com os resultados da busca
        return view('site.agendamentos', compact('findEvento'));
    }

    // Função para lidar com a exclusão de eventos
    public function delete($id)
    {
        try {
            // Lógica para excluir o evento do banco de dados
            Evento::table('eventos')->where('id', $id)->delete();

            return redirect()->back()->with('success', 'Evento excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o evento.');
        }
    }

    // Função para exibir a página de agendamentos
    public function agendamentos()
    {
        return view('site.agendamentos');
    }
}
