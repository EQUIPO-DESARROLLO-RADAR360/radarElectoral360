<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electores extends Model
{
    use HasFactory;

    /**
     * The name of the factory that should be used for this model.
     *
     * @var string
     */
    protected static function newFactory()
    {
        return \Database\Factories\ElectorFactory::new();
    }

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

    /**
     * Relación muchos a muchos con Eventos
     */
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'elector_evento', 'elector_id', 'evento_id')
                    ->withPivot('asistio')
                    ->withTimestamps();
    }
}
