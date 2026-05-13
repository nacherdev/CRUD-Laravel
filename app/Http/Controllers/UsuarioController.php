<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Libro;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::all();
        return view('welcome', compact('usuarios'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birth' => 'nullable|date',
        ]);

        Usuario::create($request->all());

        return redirect('/')->with('success', 'Usuario creado correctamente');
    }

    public function edit(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return redirect('/')->with('success', 'Usuario editado correctamente');
    }

    public function editForm($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('editar-usuario', compact('usuario'));
    }

    public function destroy(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        $usuario->libros()->delete();
        $usuario->delete();
        return redirect('/')->with('success', 'Usuario eliminado correctamente');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            return redirect('/buscar-usuario')->with('error', 'Usuario no encontrado');
        }

        // Redirige al formulario de edición con el usuario encontrado
        return redirect("/editar-usuario/{$usuario->id}");
    }

    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'usuarios' => 'required|array',
            'usuarios.*' => 'integer|exists:usuarios,id',
        ]);
    
        Libro::whereIn('id_autor', $request->usuarios)->delete();
        Usuario::whereIn('id', $request->usuarios)->delete();
    
        // Redirigimos con mensaje de éxito
        return redirect('/panel-admin')->with('success', 'Usuarios eliminados correctamente');
    }
}