@extends('site.layouts.estruturaBasica')
@section('titulo','Todos os agendamentos')
@extends('')
@section('principal')

    @include('site.layouts._partials.topo')



<section id="home">
    <div id="caixa_formulario" class="container pt-5 pb-5">
        <div class="row">
            <h1 class="display-4 text-center col"> TODOS AGENDAMENTOS </h1>
            <br><br><br><br><br>
        </div>


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
                        <th>Ações</th>
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">

                        @foreach($findEvento as $evento)
                            <tr>
                                <th>{{$evento['id']}}</th>
                                <td>{{$evento['titulo']}}</td>
                                <td>{{$evento['data_inicial']}}</td>
                                <td>{{$evento['data_final']}}</td>
                                <td>{{$evento['descricao']}}</td>
                                <td>{{$evento['cliente']}}</td>

                                <td> 
                                    <button class="btn btn-primary btn-edit" style="display: inline;" value="'. $value['id'] .'"data-bs-toggle="modal"  data-bs-target="#editarClienteModal"> <i class="fas fa-edit"></i></button>
                                    <button  class="btn btn-danger btn-delete" style="display: inline;" value="'. $value['id'] .'"data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal"><i class="fas fa-trash-alt"></i></button>                           
                                </td>
                            </tr>
                        @endforeach

                            <div>
                                <form action = "{{route('site.eventos')}}" method = "get">
                                    <input type = "text" name ="pesquisar" placeholder= "Pesquisar " />
                                    <button type="subumit" class="btn btn-secondary" data-dismiss="modal">Pesquisar</button>
                                </form>
                                <br><br><br>
                            </div>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>

    @component('site.layouts._acoes.acoes')
                 
    @endcomponent 


</section>

@endsection