@extends('layouts.app')
@section('title')
    <title>Home</title>
    <link rel="stylesheet" href="/css/home.css">
@endsection
    
    
@section('content')
    <div class="container-welcome">
        <h2>Bienvenido, {{ $usuario->name }}</h2>
        <h2>Pokemon aleatorio</h2>
        <div class="pokedex-container">
            <table>
                <tbody>
                    <tr>
                        <td rowspan="8" class="pokemon-foto">
                            <img src="{{ $pokemon['sprites']['other']['official-artwork']['front_default'] }}" alt="{{ $pokemon['name'] }}">
                        </td>
                        <td class="dato-label"><strong>Nombre:</strong> {{ ucfirst($pokemon['name']) }}</td>
                    </tr>
                    <tr><td><strong>Tipo:</strong> {{ ucfirst($pokemon['types'][0]['type']['name']) }}</td></tr>
                    <tr><td><strong>HP:</strong> {{ $pokemon['stats'][0]['base_stat'] }}</td></tr>
                    <tr><td><strong>Ataque:</strong> {{ $pokemon['stats'][1]['base_stat'] }}</td></tr>
                    <tr><td><strong>Defensa:</strong> {{ $pokemon['stats'][2]['base_stat'] }}</td></tr>
                    <tr><td><strong>Velocidad:</strong> {{ $pokemon['stats'][5]['base_stat'] }}</td></tr>
                    <tr><td><strong>Altura:</strong> {{ $pokemon['height'] / 10 }} m</td></tr>
                    <tr><td><strong>Peso:</strong> {{ $pokemon['weight'] / 10 }} kg</td></tr>
                </tbody>
            </table>
        </div>

        <button class="btn-home" onclick="window.location.reload()">Nuevo Pokémon</button>
    </div>
@endsection
