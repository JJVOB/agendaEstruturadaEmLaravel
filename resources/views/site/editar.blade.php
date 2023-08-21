@extends('layouts.app')

@section('content')
    <h1>Editar Evento</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('evento.update', ['id' => $evento->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="{{ $evento->titulo }}" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required>{{ $evento->descricao }}</textarea>
        <br>
        <button type="submit">Atualizar Evento</button>
    </form>
@endsection
