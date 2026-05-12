<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    @yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/ver-libros">Ver libros</a></li>
                <li><a href="/perfil">Perfil</a></li>
                @if ($usuario->admin)
                    <li><a href="/panel-admin">Panel de administrador</a></li>
                @endif
                <li><form action="/logout" method="post">
                    @csrf
                    <input type="submit" value="Logout">
                </form></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    

    
</body>
</html>
