<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
</head>
<body>
    <h1>Perfil de usuario</h1>
    <h2>Datos del usuario</h2>
    <p>Nombre: {{ $usuario->name }}</p>
    <p>Email: {{ $usuario->email }}</p>
    <p>Fecha de nacimiento: {{ $usuario->birth }}</p>
    <p>Libros: {{ $usuario->libros->count() }}</p>
    <a href="/">Volver</a>
</body>
</html>