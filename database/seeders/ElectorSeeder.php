<?php

namespace Database\Seeders;

use App\Models\Electores;
use Illuminate\Database\Seeder;

class ElectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 50 electores de prueba
        Electores::factory(50)->create();
    }
}
