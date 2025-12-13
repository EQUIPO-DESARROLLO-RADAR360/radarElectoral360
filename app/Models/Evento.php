<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreEvento',
        'fecha',
        'hora',
        'ubicacion',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Relación muchos a muchos con Electores
     */
    public function electores()
    {
        return $this->belongsToMany(Electores::class, 'elector_evento', 'evento_id', 'elector_id')
                    ->withPivot('asistio')
                    ->withTimestamps();
    }

    /**
     * Obtener el número de electores registrados
     */
    public function getRegistradosCountAttribute()
    {
        return $this->electores()->count();
    }
}
