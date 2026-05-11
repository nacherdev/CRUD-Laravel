<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::get('/', [UsuarioController::class, 'index']);

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

Route::get('/buscar-usuario', function () {
    return view('buscar-usuario');
});

Route::post('/buscar-usuario', [UsuarioController::class, 'buscar']);

Route::delete('/eliminar-usuarios', [UsuarioController::class, 'destroyMultiple']);