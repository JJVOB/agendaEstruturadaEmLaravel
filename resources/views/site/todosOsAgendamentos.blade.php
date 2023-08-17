@extends('site.layouts.estruturaBasica')
@section('titulo','Agendamentos Futuros')

@section('principal')

    @include('site.layouts._partials.topo')

<section id="home">

        <div class="row justify-content-center">
            <table id="tabela" class="table table-bordereds justify-content-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do evento</th>
                        <th>Data de inicio</th>
                        <th>Data final</th>
                        <th>Descrição do evento</th>
                        <th>Cliente</th>
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">

                        @foreach($findEvento as $evento)
                            <tr>
                                <td> {{$evento->titulo}}</td>
                                <td> {{$evento->data_inicial}}</td>
                                <td> {{$evento->data_final}}</td>
                                <td> {{$evento->descricao}}</td>
                                <td> {{$evento->cliente}}</td>

                            </tr>
                        @endforeach

                        <div>
                            <form action = "" method = "get">
                                <input type = "text" name ="pesquisar" placeholder= "Pesquisar " />
                                <button type="button" onclick="location.href='{{ route('site.agendamentosAnteriores') }}' " class="btn btn-secondary" data-dismiss="modal">Pesquisar</button>
                            </form>
                        </div>
                    </tbody>
                </thead>
            </table>
        </div>

    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabel">Editar Cliente</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    @component('site.layouts._components.form')
                
                    @endcomponent 
            </div>
        </div>
    </div>


@endsection