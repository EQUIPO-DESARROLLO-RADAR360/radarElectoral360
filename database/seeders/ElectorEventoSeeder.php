<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Electores;
use Illuminate\Database\Seeder;

class ElectorEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = Evento::all();
        $electores = Electores::all();

        // Asociar aleatoriamente electores a eventos
        foreach ($eventos as $evento) {
            // Cada evento tendrá entre 5 y 30 electores registrados
            $numElectores = rand(5, min(30, $electores->count()));
            $electoresAleatorios = $electores->random($numElectores);

            foreach ($electoresAleatorios as $elector) {
                $evento->electores()->attach($elector->id, [
                    'asistio' => rand(0, 1) == 1, // 50% de probabilidad de asistencia
                ]);
            }
        }
    }
}
