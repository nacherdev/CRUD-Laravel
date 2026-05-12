<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Libro</title>
</head>
<body>
    <a class="btn-ver-usuarios" href="/">Volver</a>
    <div class="container">
        <h1>Crear Libro</h1>
        <form action="/crear-libro" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="titulo" id="titulo" placeholder="Titulo">
            </div>
            <div class="form-group">
                <input type="text" name="autor" id="autor" placeholder="Autor">
            </div>
            <div class="form-group">
                <input type="number" name="ano" id="ano" placeholder="Año">
            </div>
            <input type="submit" value="Crear libro">
        </form>
    </div>
</body>
</html>