<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/css/eliminar-usuario.css">
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Eliminar Usuario</h1>
        <form action="/eliminar-usuario" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="id" id="id" placeholder="ID del usuario">
                <input type="submit" value="Eliminar usuario">
            </div>
        </form>
    </div>
</body>
</html>