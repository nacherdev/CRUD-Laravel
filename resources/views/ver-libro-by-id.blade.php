<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros del usuario {{ $usuario->name }}</title>
    <link rel="stylesheet" href="/css/ver-libros-by-id.css">
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Libros del usuario {{ $usuario->name }}</h1>
        <ul class="libros-list">
            @foreach ($libros as $libro)
                <li data-id>{{ $libro->titulo }} - {{ $libro->ano }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>