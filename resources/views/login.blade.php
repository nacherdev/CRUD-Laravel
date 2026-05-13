<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/app.css">
</head> 
<body>
    <h1 class="title">Bookify</h1>
    <div class="container">
        <h2 class="title-login">Login</h2>
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <input type="email" name="email" id="email" placeholder="Email" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
            <input class="btn-login" type="submit" value="Login">
            <a class="btn-register" href="/register">Register</a>

        </form>

    </div>
</body>
</html>