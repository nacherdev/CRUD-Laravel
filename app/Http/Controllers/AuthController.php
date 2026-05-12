<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
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
        $usuario = Auth::user();
        return view('home', compact('usuario'));
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