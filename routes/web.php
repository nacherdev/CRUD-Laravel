<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

//////////////////////////////////////////////////////////////////////////

// Rutas publicas
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Rutas loggeado
Route::middleware('auth')->group(function () {

    Route::get('/', [AuthController::class, 'showHome']); // home

    Route::get('/ver-libros', [LibroController::class, 'index']);
    Route::get('/ver-libros/{id}', [LibroController::class, 'indexById']);
    Route::get('/perfil', [AuthController::class, 'showPerfil'])->name('perfil');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/pokemon', [AuthController::class, 'showPokemon']);
    Route::get('/scraper-wikipedia', [AuthController::class, 'showScraperWikipedia']);
    Route::post('/scraper-wikipedia', [AuthController::class, 'scrapeWikipedia']);
});

// Rutas admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/form-usuario', function () {
        return view('crear-usuario');
    });

    Route::post('/crear-usuario', [UsuarioController::class, 'store']);

    Route::get('/editar-usuario', function () {
        return view('buscar-usuario');
    });

    Route::get('/editar-usuario/{id}', [UsuarioController::class, 'editForm']);

    Route::put('/editar-usuario/{id}', [UsuarioController::class, 'edit']);

    Route::get('/eliminar-usuario', function () {
        return view('eliminar-usuario');
    });

    Route::post('/eliminar-usuario', [UsuarioController::class, 'destroy']);

    Route::post('/buscar-usuario', [UsuarioController::class, 'buscar']);

    Route::delete('/eliminar-usuarios', [UsuarioController::class, 'destroyMultiple']);

    Route::post('/crear-libro', [LibroController::class, 'store']);

    Route::get('/panel-admin', [AuthController::class, 'showPanelAdmin']);
});