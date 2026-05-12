<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Libro;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'birth',
        'password',
        'admin',
    ];

    protected $hidden = [
        'password',
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_autor');
    }
}