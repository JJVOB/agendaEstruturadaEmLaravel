@extends('site.layouts._partials.estruturaBasica')
@section('titulo', 'Eventos Agendados')

@section('principal')

@include('site.layouts._partials.topo') 

<section id="home">
    <div id="caixa_formulario" class="container pt-5 pb-5">
        <div class="row">
            <h1 class="display-4 text-center col"> Editar Evento </h1>
            <br><br><br><br><br>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <br><br>

        <div class="row justify-content-center">
            <table id="tabela" class="table table-bordereds justify-content-center">

            
                <form action="{{ route('evento.update', ['id' => $evento->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="titulo">Título:</label>
                    <input class="form-control" type="text" name="titulo" value="{{ $evento->titulo }}" required>
                    <br>
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" name="descricao" required>{{ $evento->descricao }}</textarea>
                    <br> <br>
                    <button class="btn btn-outline-info" type="submit">Atualizar Evento</button>
                </form>
                <tbody class="table table-bordereds justify-content-center">

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
