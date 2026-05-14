console.log('wiki-scraper.js cargado');
document.getElementById('scraperForm').addEventListener('submit', function() {
    // 1. Mostramos el área de carga
    document.getElementById('loadingArea').style.display = 'block';
    // 2. Ocultamos los resultados anteriores si los hubiera
    if(document.getElementById('resultsArea')) {
        document.getElementById('resultsArea').style.display = 'none';
    }
    // 3. Deshabilitamos el botón para evitar doble clic
    document.getElementById('btnSubmit').disabled = true;
    document.getElementById('btnSubmit').innerText = 'Procesando...';
});