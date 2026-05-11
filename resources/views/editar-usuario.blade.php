<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario {{ $usuario->name }}</title>
    <link rel="stylesheet" href="/css/editar-usuario.css">
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Editar Usuario {{ $usuario->name }}</h1>
        <form action="/editar-usuario/{{ $usuario->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Nombre" value="{{ $usuario->name ?? '' }}">
                <input type="email" name="email" id="email" placeholder="Email" value="{{ $usuario->email ?? '' }}">
                <input type="date" name="birth" id="birth" placeholder="Fecha de nacimiento" value="{{ $usuario->birth ?? '' }}">
                <input type="submit" value="Editar usuario">
            </div>

        </form>
    </div>
</body>
</html>