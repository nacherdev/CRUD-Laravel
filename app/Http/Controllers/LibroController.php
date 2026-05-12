<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        $usuario = Auth::user();
        return view('ver-libros', compact('libros', 'usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'ano' => 'required|integer',
        ]);

        Libro::create($request->all());

        return redirect('/ver-libros/' . $request->usuario_id)->with('success', 'Libro creado correctamente');
    }
    
    public function indexById($id)
    {
        $libros = Usuario::findOrFail($id)->libros;
        $usuario = Usuario::findOrFail($id);
        return view('ver-libro-by-id', compact('libros', 'usuario'));
    }
}
