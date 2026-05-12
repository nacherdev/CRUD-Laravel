<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de libros</title>
    <link rel="stylesheet" href="/css/ver-libros.css">
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <div class="btn-volver">
        <a class="btn-ver-usuarios" href="/">Volver</a>
    </div>

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
</body>
</html>