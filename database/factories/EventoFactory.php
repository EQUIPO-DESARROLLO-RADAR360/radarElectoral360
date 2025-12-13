<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estados = ['Activo', 'Finalizado', 'Programado', 'Cancelado'];
        
        return [
            'nombreEvento' => $this->faker->sentence(3),
            'fecha' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'hora' => $this->faker->time('H:i'),
            'ubicacion' => $this->faker->address(),
            'estado' => $this->faker->randomElement($estados),
        ];
    }
}
