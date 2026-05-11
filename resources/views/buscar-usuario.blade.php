<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuario</title>
    <link rel="stylesheet" href="/css/buscar-usurio.css">
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Buscar Usuario</h1>
        <form action="/buscar-usuario" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Email del usuario">
                <input type="submit" value="Buscar usuario">
            </div>

        </form>
    </div>
</body>
</html>