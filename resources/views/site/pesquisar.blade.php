@extends('site.layouts._partials.estruturaBasica')
@section('titulo', 'Eventos Agendados')

@section('principal')

@include('site.layouts._partials.topo') 

<section id="home">
    <div id="caixa_formulario" class="container pt-5 pb-5">
        <div class="row">
            <h1 class="display-4 text-center col"> TODOS AGENDAMENTOS </h1>
            <br><br><br><br><br>
        </div>

        <br><br>

        <form action="{{ route('site.pesquisar') }}" method="get">
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="pesquisa" placeholder="Informe o nome do evento" required>
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </div>
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
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->descricao }}</td>
                            <td>{{ $evento->data_inicial }}</td>
                            <td>{{ $evento->data_final }}</td>
                            <td>{{ $evento->cliente }}</td>
                            <td> 
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <input class="btn btn-danger btn-sm" type="submit" 
                                onclick="deleteEvento({{ $evento->id }})" 
                                value=" Excluir "/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
