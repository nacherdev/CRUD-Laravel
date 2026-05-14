@extends('layouts.app')
@section('title')
    <title>Pokemon</title>
    <link rel="stylesheet" href="/css/pokemon.css">
@endsection
@section('content')
    <div class="container-pokemon">
        <h2>Pokemon aleatorio</h2>
        <div class="container">
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
                </tbody>
            </table>
        </div>
        </div>
        <button class="btn-reload-pokemon" onclick="window.location.reload()">Nuevo Pokémon</button>

    </div>

@endsection