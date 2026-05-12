@extends('layouts.app')
    @section('title')
    <title>Home</title>
    <link rel="stylesheet" href="/css/home.css">
    @endsection
    
    
    @section('content')
    <h1>Home</h1>
    <div class="container-welcome">
        <h2>Bienvenido, {{ $usuario->name }}</h2>
    </div>
    @endsection
