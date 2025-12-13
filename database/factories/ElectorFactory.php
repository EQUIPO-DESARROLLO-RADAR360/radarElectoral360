<?php

namespace Database\Factories;

use App\Models\Electores;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Electores>
 */
class ElectorFactory extends Factory
{
    protected $model = Electores::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->unique()->numerify('########'),
            'nombres' => $this->faker->firstName(),
            'apellidP' => $this->faker->lastName(),
            'apellidoM' => $this->faker->lastName(),
            'region' => $this->faker->randomElement(['Lima', 'Arequipa', 'Cusco', 'Trujillo', 'Chiclayo']),
            'provincia' => $this->faker->city(),
            'distrito' => $this->faker->citySuffix(),
            'direccion' => $this->faker->address(),
            'ocupacion' => $this->faker->jobTitle(),
            'whatsapp' => $this->faker->numerify('9#######'),
            'ticked' => $this->faker->bothify('?##??##'),
            'terms_accepted' => true,
        ];
    }
}
