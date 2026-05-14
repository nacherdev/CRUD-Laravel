<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('birth');
            $table->string('username')->unique();
            $table->text('biografia')->nullable();
            $table->boolean('admin')->default(false);
            $table->timestamps();
        });
    
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('id_autor')->constrained('usuarios')->onDelete('cascade');
            $table->integer('ano');
            $table->timestamps();
        });
    
        Schema::create('datos_scraping', function (Blueprint $table) {
            $table->id();
            $table->string('busqueda');
            $table->text('parrafo');
            $table->text('palabras_con_a');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        // El orden correcto es borrar primero las tablas que tienen "hijos" (FK)
        Schema::dropIfExists('libros');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('datos_scraping');
    }
};
