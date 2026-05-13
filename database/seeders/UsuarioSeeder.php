<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::factory()->create([
            'name' => 'Nacher',
            'email' => 'nacher@nacher.com',
            'birth' => '1990-01-01',
            'password' => Hash::make('Nacher'),
            'username' => 'nacherpro02',
            'biografia' => 'Soy un desarrollador web y programador y admin de la aplicación',
            'admin' => true,
        ]);
    }
}
