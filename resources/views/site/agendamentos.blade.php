@extends('site.layouts.estruturaBasica') 

@section('titulo', 'Todos os agendamentos') 

@section('principal') 

    @include('site.layouts._partials.topo') 

    <section id="home">
        <div id="caixa_formulario" class="container pt-5 pb-5">
            <div class="row">
                <h1 class="display-4 text-center col"> TODOS AGENDAMENTOS </h1>
                <br><br><br><br><br>
            </div>
        <form action="{{ route('site.eventos') }}" method="get">
                <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button> Pesquisar </button>
        </form>

    <br><br>
       <div class="row justify-content-center">
            <table id="tabela" class="table table-bordereds justify-content-center">
                <tr>
                    <th>#</th>
                    <th>Nome do evento</th>
                    <th>Descrição do evento</th>
                    <th>Data de inicio</th>
                    <th>Data final</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
                    <tbody class="table table-bordereds justify-content-center">
                    
                        @component('site.layouts._exbAgenda.exbAgenda')
                
                        @endcomponent 
                    </tbody>
                </thead>
            </table>
        </div>

        </div>

        <!-- Componente para exibir ações (ações.blade.php) -->
        @component('site.layouts._acoes.acoes')     
        @endcomponent


@endsection
