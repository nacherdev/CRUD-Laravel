<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth' => $this->faker->date(),
            'password' => Hash::make('password'),
            'username' => $this->faker->unique()->userName(),
            'biografia' => $this->faker->sentence(),
            'admin' => $this->faker->boolean(20)
        ];
    }
}
