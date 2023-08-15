@extends('site.layouts.estruturaBasica')
@section('titulo','Home')

@section('principal')

    @include('site.layouts._partials.topo')

    <section id="home">
        <div id="caixa_formulario" class="container pt-5 pb-5">
            <div class="row">
                <h1 class="display-4 text-center col"> AGENDA </h1>
            </div>

            <div class="display-4 text-center col">
                    <input class="btn btn-custom btn-branco" type="submit" onclick="location.href='{{ route('site.agenda') }}'" value=" Criar agendamento  "/>
                    <input class="btn btn-custom btn-branco" type="submit" onclick="location.href='{{ route('site.agendamentosAnteriores') }}' " value=" Listar próximos agendamento "/>
                    <input class="btn btn-custom btn-branco" type="submit" onclick="location.href='{{ route('site.agendamentosFuturos') }}' " value=" Listar agendamento anteriores"/>
            </div>
        </div>
    </section>

@endsection