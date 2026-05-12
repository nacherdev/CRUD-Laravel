<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    protected $fillable = ['titulo', 'id_autor', 'ano', 'autor'];
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_autor');
    }
}