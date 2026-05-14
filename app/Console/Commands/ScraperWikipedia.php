<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ScraperWikipedia extends Command
{
    protected $signature = 'wiki:scrape {busqueda=Diddy}';
    public function handle()
    {
        $busqueda = $this->argument('busqueda');
        $this->info("Buscando en Wikipedia: {$busqueda}...");

        $process = new Process(['node', base_path('scraper.js'), $busqueda]);
        $process->run();

        // Busca esta parte en tu handle()
        if (!$process->isSuccessful()) {
            $this->error('El script falló. Error detallado:');
            $this->error($process->getErrorOutput()); // Esto nos dirá el error real de Node
            return;
        }

        $resultado = json_decode($process->getOutput(), true);
        $texto = $resultado['parrafo'];

        $palabrasA = collect(explode(' ', $texto))
            ->map(fn($p) => trim($p, ".,()[]\"'"))
            ->filter(fn($p) => str_starts_with(strtolower($p), 'a') && strlen($p) > 1)
            ->implode(', ');

        DB::table('datos_scraping')->insert([
            'parrafo' => $texto,
            'palabras_con_a' => $palabrasA,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->info("Guardado con éxito.");
        $this->info("Palabras detectadas: " . $palabrasA);
    }
}