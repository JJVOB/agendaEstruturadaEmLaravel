@extends('site.layouts.estruturaBasica') // Estende o layout 'estruturaBasica'

@section('titulo', 'Todos os agendamentos') // Define o título da página

@section('principal') // Define a seção 'principal' do layout

    @include('site.layouts._partials.topo') // Inclui o topo do layout

    <section id="home">
        <div id="caixa_formulario" class="container pt-5 pb-5">
            <div class="row">
                <h1 class="display-4 text-center col"> TODOS AGENDAMENTOS </h1>
                <br><br><br><br><br>
            </div>

            <div class="row justify-content-center">
                @if($findEvento->isEmpty())
                    <p> Não existe dados </p>
                @else
                    <!-- Criação da tabela de eventos -->
                    <table id="tabela" class="table table-bordereds justify-content-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome do evento</th>
                                <th>Data de inicio</th>
                                <th>Data final</th>
                                <th>Descrição do evento</th>
                                <th>Cliente</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop para exibir os eventos -->
                            @foreach($findEvento as $evento)
                                <tr>
                                    <th>{{$evento['id']}}</th>
                                    <td>{{$evento['titulo']}}</td>
                                    <td>{{$evento['data_inicial']}}</td>
                                    <td>{{$evento['data_final']}}</td>
                                    <td>{{$evento['descricao']}}</td>
                                    <td>{{$evento['cliente']}}</td>
                                    <td>
                                        <!-- Botão para editar (abre um modal) -->
                                        <a href="" class="btn btn-primary btn-edit" style="display: inline;" data-bs-toggle="modal" data-bs-target="#editarClienteModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <!-- Botão para excluir (chama a função deleteEvento) -->
                                        <meta name='csrf-token' content="{{csrf_token}}" />
                                        <a onclick="deleteEvento('{{route('site.delete')}}',{{$evento->id}})" class="btn btn-danger btn-delete" style="display: inline;"  data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Formulário de pesquisa -->
                <div>
                    <form action="{{route('site.eventos')}}" method="get">
                        <input type="text" name="pesquisar" placeholder="Pesquisar"/>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Pesquisar</button>
                    </form>
                    <br><br><br>
                </div>
            </div>
        </div>

        <!-- Componente para exibir ações (ações.blade.php) -->
        @component('site.layouts._acoes.acoes')     
        @endcomponent

    </section>

@endsection
