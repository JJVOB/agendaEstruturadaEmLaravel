@extends('site.layouts.estruturaBasica') <!-- Estende o layout 'estruturaBasica' -->

@section('titulo', 'Todos os agendamentos') <!-- Define o título da página -->

@section('principal') <!-- Define a seção 'principal' do layout -->

    @include('site.layouts._partials.topo') <!-- Inclui o topo do layout -->

    <section id="home">

   <div id="caixa_formulario" class="container pt-5 pb-5">
        <div class="row">
            <h1 class="display-4 text-center col">AGENDAMENTOS ANTERIORES</h1>
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
                    </tr>
                    <tbody class="table table-bordereds justify-content-center">
                    
                        @component('site.layouts._exbAgenda.exbAgenda')
                
                        @endcomponent 
                    </tbody>
                </thead>
            </table>
        </div>
        
    </div>


    </section>

@endsection
