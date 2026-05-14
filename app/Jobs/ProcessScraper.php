<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Log; // Usamos Log en lugar de info()

class ProcessScraper implements ShouldQueue
{
    use Queueable;

    protected $busqueda;

    /**
     * El constructor recibe el dato desde el controlador
     */
    public function __construct($busqueda)
    {
        $this->busqueda = $busqueda;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
{
    Log::info("Iniciando proceso para: " . $this->busqueda);

    $process = new Process(['node', base_path('scraper.js'), $this->busqueda]);
    $process->setEnv([
        'PLAYWRIGHT_BROWSERS_PATH' => '/var/www/html/pw-browsers'
    ]);
    $process->run();

    $output = $process->getOutput();
    $errorOutput = $process->getErrorOutput();

    // 1. ¿Node falló a nivel de sistema?
    if (!$process->isSuccessful()) {
        Log::error("Fallo crítico en Node: " . $errorOutput);
        return;
    }

    // 2. ¿Qué escupió Node exactamente? (Míralo en storage/logs/laravel.log)
    Log::info("Output crudo de Node: " . $output);

    $resultado = json_decode($output, true);

    // 3. ¿El JSON es válido?
    if (json_last_error() !== JSON_ERROR_NONE) {
        Log::error("Error decodificando JSON: " . json_last_error_msg());
        Log::error("Contenido que falló: " . $output);
        return;
    }

    if (!isset($resultado['parrafo'])) {
        Log::error("El JSON no contiene la llave 'parrafo'");
        return;
    }

    $texto = $resultado['parrafo'];

    $texto = preg_replace('/\[[a-zA-Z\s]*\d*\]/', '', $texto);
    $texto = preg_replace('/<[^>]*>/', '', $texto);
    $texto = preg_replace('/&[^;]*;/', '', $texto);
    $texto = trim($texto);
    // Procesar palabras...
    $palabrasA = collect(explode(' ', $texto))
        ->map(fn($p) => trim($p, ".,()[]\"'"))
        ->filter(fn($p) => str_starts_with(strtolower($p), 'a') && strlen($p) > 1)
        ->implode(', ');

    // 4. Intentar el insert y capturar error de SQL
    try {
        DB::table('datos_scraping')->insert([
            'busqueda'       => $this->busqueda,
            'parrafo'        => $texto,
            'palabras_con_a' => $palabrasA,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
        Log::info("¡Guardado exitoso en DB!");
    } catch (\Exception $e) {
        Log::error("Error al insertar en DB: " . $e->getMessage());
    }
}
}