<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Evento; // Importa o modelo 'Evento' para usar no controller

class agendaController extends Controller
{

            //use HasFactory; 
    
    public function agenda(Request $request){
        return view('site.agendamentos'); // Retorna a visualização 'site.agenda'
    }

    public function teste(Request $request){
        return view('site.teste'); // Retorna a visualização 'site.agenda'
    }

    public function cadastraEvento(Request $request){
        // Cria uma nova instância do modelo 'Evento'
        $agenda = new Evento();
        dd($request);
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

    public function editarEvento(Request $request,$id){

        $agenda = new Evento();

        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $buscaRegistro = Evento::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('produto.index');
        }
        $findProduto = Evento::where('id', '=', $id)->first();

        return view('pages.produtos.atualiza', compact('findProduto'));
    
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

    
        // Função para exibir eventos com possibilidade de busca
        public function pesquisarEvento(Request $request)
        {
          //  dd($request);
            // Cria uma instância do modelo Evento
            $evento = new Evento();

            // Obtém o termo de pesquisa do formulário
            $pesquisar = $request->pesquisar;
     
            // Chama o método 'buscarEventos' no modelo para procurar eventos com o termo de pesquisa
            $findEvento = $evento->buscarEventos('search', $pesquisar ?? '');
    
            // Retorna a visualização 'site.agendamentos' com os resultados da busca
            return view('site.agendamentos', compact('findEvento'));
        }
    
        // Função para lidar com a exclusão de eventos
        public function delete(Request $request)
        {
            dd($request);
            $id = $request->id;
            $buscarEventos = Evento::find($id);
            $buscarEventos->delete();
            return response()->json(['success' => true]);
        }
    

}
