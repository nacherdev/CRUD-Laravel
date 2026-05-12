<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <h1>Register</h1>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="date" name="birth" id="birth" placeholder="Birth">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" value="Register">
    </form>
    <a href="/login">Login</a>
</body>
</html>