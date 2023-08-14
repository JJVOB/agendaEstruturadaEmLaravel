@extends('site.layouts.estruturaBasica')
@section('titulo','Cadastro do Evento')

@section('principal')

    @include('site.layouts._partials.topo')

    <section id="home">
        <div id="caixa_formulario" class="container pt-5 pb-5">
            <div class="row">
                <h1 class="display-4 text-center col"> AGENDAR EVENTO </h1>
            </div>

            @component('site.layouts._components.form')
                
            @endcomponent

            <div class="row justify-content-center">
               
            </div>
        </div>
    </section>


@endsection