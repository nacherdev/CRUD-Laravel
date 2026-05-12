<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/panel-admin.css">
    <title>Panel de administrador</title>
</head>
<body>

<div class="container">
    <h1>Panel de administrador</h1>
    <h2>Usuarios registrados</h2>
    <h3>Bienvenido, {{ $usuario->name }}</h3>
    <form action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>

    <form action="/eliminar-usuarios" method="post" id="form-eliminar">
        @csrf
        @method('DELETE')

        <ul class="usuarios-list" id="usuarios-list">
            @if ($usuarios->count() > 0)
                @foreach ($usuarios as $usuario)
                    <li data-id="{{ $usuario->id }}">
                        <span>{{ $usuario->name }} - {{ $usuario->email }} - {{ $usuario->birth }}</span>
                        <a href="/editar-usuario/{{ $usuario->id }}">Editar</a>
                        <a href="/ver-libros/{{ $usuario->id }}">Ver sus libros</a>
                    </li>
                    
                @endforeach
            @else
                <li>No hay usuarios registrados</li>
            @endif
        </ul>

        <button type="submit" id="btn-eliminar-seleccionados" style="display:none;">Eliminar seleccionados</button>
    </form>

    <div class="btn-container">
        <a href="/form-usuario">Crear usuario</a>
        <a href="/editar-usuario">Editar usuario por email</a>
        <a href="#" id="btn-activar-eliminar">Eliminar usuario</a>
        <a href="/ver-libros">Ver todos los libros</a>
    </div>
</div>

<script src="/js/select-usuarios.js"></script>

</body>
</html>