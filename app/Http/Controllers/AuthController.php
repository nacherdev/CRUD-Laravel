<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Jobs\ProcessScraper;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        $usuario = Auth::user();

        if ($usuario) {
            return redirect('/');
        }
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

    public function showPokemon()
    {
        $usuario = Auth::user();
        $num_random = rand(1, 1025);
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . $num_random);
        $pokemon = $response->json();
        $pokemon_habilities = Http::get('https://pokeapi.co/api/v2/pokemon/' . $num_random . '/abilities');
        $pokemon_habilities = $pokemon_habilities->json();
        $pokemon_type = Http::get('https://pokeapi.co/api/v2/pokemon/' . $num_random . '/types');
        $pokemon_type = $pokemon_type->json();
        $response2 = Http::get('https://pokeapi.co/api/v2/pokemon-species/' . $num_random);
        $pokemon_species = $response2->json();
        $pokemon_evolution_chain = Http::get('https://pokeapi.co/api/v2/evolution-chain/' . $num_random);
        $pokemon_evolution_chain = $pokemon_evolution_chain->json();

        return view('pokemon', compact('usuario','pokemon', 'pokemon_habilities', 'pokemon_type', 'pokemon_species', 'pokemon_evolution_chain'));
    }

    public function showScraperWikipedia()
    {
        $resultado = null;
        $usuario = Auth::user();
        return view('wiki-scraper', compact('resultado', 'usuario'));
    }

    public function scrapeWikipedia(Request $request)
    {
        $usuario = Auth::user();
        $termino_busqueda = $request->input('busqueda');
        ProcessScraper::dispatchSync($termino_busqueda);
        $resultado = DB::table('datos_scraping')->where('busqueda', $termino_busqueda)->latest()->first();

        return view('wiki-scraper', [
            'resultado' => $resultado,
            'busqueda' =>  $termino_busqueda,
            'usuario' => $usuario
        ]);
    }
}