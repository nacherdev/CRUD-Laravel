<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head> 
<body>
    <div class="container">
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
    <a href="/register">Register</a>
    </div>
</body>
</html>