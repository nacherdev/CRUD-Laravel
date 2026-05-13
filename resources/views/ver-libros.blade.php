@extends('layouts.app')
    @section('title')
    <title>Lista de libros</title>

    <link rel="stylesheet" href="/css/ver-libros.css">
    @endsection
    @section('content')
    <div class="container">
        <h1>Lista de libros</h1>
        <ul class="libros-list">
            @if ($libros->count() > 0)
                @foreach ($libros as $libro)
                    <li data-id>{{ $libro->titulo }} - {{ $libro->usuario->name }} - {{ $libro->ano }}</li>
                @endforeach
            @else
                <li>No hay libros registrados</li>
            @endif
        </ul>
    </div>
    @endsection
