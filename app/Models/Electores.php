<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electores extends Model
{
    use HasFactory;

    // Especifica qué campos pueden ser asignados masivamente
    protected $fillable = [
        'dni',
        'nombres',
        'apellidP',
        'apellidoM',
        'region',
        'provincia',
        'distrito',
        'direccion',
        'ocupacion',
        'whatsapp',
        'ticked',
        'terms_accepted'
    ];
}
