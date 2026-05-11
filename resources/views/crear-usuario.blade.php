<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/css/crear-usuario.css">
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Crear Usuario</h1>
        <form action="/crear-usuario" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Nombre">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="date" name="birth" id="birth" placeholder="Fecha de nacimiento">
                <input type="submit" value="Crear usuario">
            </div>
        </form>
        
    </div>

</body>
</html>
