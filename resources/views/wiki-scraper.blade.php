@extends('layouts.app')

@section('title')
    <link rel="stylesheet" href="/css/wiki-scraper.css">
    <title>Scraper Wikipedia</title>
@endsection

@section('content')
<div class="container">
    <h1>Scraper Wikipedia</h1>
    
    <form action="/scraper-wikipedia" method="post" id="scraperForm">
        @csrf
        <input type="text" name="busqueda" id="busqueda" placeholder="¿Qué quieres buscar?" required>
        <button type="submit" id="btnSubmit">Iniciar Scraper</button>
    </form>

    <div id="loadingArea">
        <div class="spinner"></div> <p><strong>Buscando...</strong></p>
    </div>

    <div id="resultsArea">
        @if(isset($resultado) && $resultado)
            <div class="resultado">
                <h3>{{ $busqueda }}:</h3>
                <p>{{ $resultado->parrafo }}</p>
                <br>
                <p><strong>Palabras con A:</strong> {{ $resultado->palabras_con_a }}</p>
            </div>
        @endif
    </div>
</div>

@endsection

@section('scripts')
    <script src="/js/wiki-scraper.js"></script>
@endsection