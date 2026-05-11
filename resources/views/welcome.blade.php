<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/ver-usuarios.css">
    <title>CRUD de usuarios</title>
</head>
<body>

<div class="container">
    <h1>Usuarios registrados</h1>

    <form action="/eliminar-usuarios" method="post" id="form-eliminar">
        @csrf
        @method('DELETE')

        <ul class="usuarios-list" id="usuarios-list">
            @if ($usuarios->count() > 0)
                @foreach ($usuarios as $usuario)
                    <li data-id="{{ $usuario->id }}">
                        <span>{{ $usuario->name }} - {{ $usuario->email }} - {{ $usuario->birth }}</span>
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
        <a href="/editar-usuario">Editar usuario</a>
        <a href="#" id="btn-activar-eliminar">Eliminar usuario</a>
    </div>
</div>

<script src="/js/select-usuarios.js"></script>

</body>
</html>