@extends('site.layouts.estruturaBasica') <!-- Estende o layout 'estruturaBasica' -->

@section('titulo', 'Todos os agendamentos') <!-- Define o título da página -->

@section('principal') <!-- Define a seção 'principal' do layout -->

    @include('site.layouts._partials.topo') <!-- Inclui o topo do layout -->

    <section id="home">
        <div id="caixa_formulario" class="container pt-5 pb-5">
            <div class="row">
                <h1 class="display-4 text-center col"> TODOS AGENDAMENTOS </h1>
                <br><br><br><br><br>
            </div>
                <!-- Formulário de pesquisa -->
            <div>
                <form action="{{route('site.eventos')}}" method="get">
                    <input type="text" name="pesquisar" placeholder="Pesquisar"/>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Pesquisar</button>
                </form>
                <br><br><br>
            </div>

            <div class="row justify-content-center">
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
               
            </div>
        </div>

        <!-- Componente para exibir ações (ações.blade.php) -->
        @component('site.layouts._acoes.acoes')     
        @endcomponent

    </section>

@endsection
