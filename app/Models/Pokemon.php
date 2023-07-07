<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'nombre',
        'tipo',
        'descripcion',
        'vida',
        'ataque',
        'defensa',
        'imagen',
        'captura'
    ];
}
