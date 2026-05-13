<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    
    {

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id()->primary();
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
            $table->id()->primary();
            $table->string('titulo');
            $table->foreignId('id_autor')->constrained('usuarios')->onDelete('cascade');
            $table->integer('ano');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('libros');

        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign(['id_autor']);
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_autor']);
        });
    }
};
