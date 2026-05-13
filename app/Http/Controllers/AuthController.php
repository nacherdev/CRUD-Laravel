<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        $usuario = Auth::user();
        return view('login', compact('usuario'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $usuario = Auth::user();
            return redirect('/')->with('success', 'Login exitoso');
            
        } else {
            return back()->withErrors([
                'email' => 'Credenciales incorrectas',
            ]);
        }
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:usuarios',
            'birth' => 'required|date',
            'password' => 'required|min:6'

        ]);

        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $request->birth,
            'password' => Hash::make($request->password),
            'admin' => false
        ]);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function showHome()
    {
        $num_random = rand(1, 1025);
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . $num_random);
        $pokemon = $response->json();
        $usuario = Auth::user();
        return view('home', compact('usuario', 'pokemon'));
    }

    public function showPanelAdmin()
    {
        $usuario = Auth::user();
        $usuarios = Usuario::all();
        return view('panel-admin', compact('usuario','usuarios'));
    }

    public function showPerfil()
    {
        $usuario = Auth::user();
        return view('perfil', compact('usuario'));
    }
}