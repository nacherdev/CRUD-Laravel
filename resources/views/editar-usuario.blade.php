@extends('layouts.app')
    @section('title')
    <title>Editar Usuario {{ $usuario->name }}</title>
    <link rel="stylesheet" href="/css/editar-usuario.css">
    @endsection
    @section('content')
    <div class="container">
        <h1>Editar Usuario {{ $usuario->name }}</h1>
        <form action="/editar-usuario/{{ $usuario->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <span>Nombre:</span>
                <input type="text" name="name" id="name" placeholder="" value="{{ $usuario->name ?? '' }}">
                <span>Email:</span>
                <input type="email" name="email" id="email" placeholder="" value="{{ $usuario->email ?? '' }}">
                <span>Fecha de nacimiento:</span>
                <input type="date" name="birth" id="birth" placeholder="" value="{{ $usuario->birth ?? '' }}">
                <input type="submit" value="Editar usuario">
            </div>

        </form>
    </div>
    @endsection
