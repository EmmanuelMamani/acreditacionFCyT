<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            carrerasSeeder::class,
            areasSeeder::class,
            variablesSeeder::class,
            indicadoresSeeder::class,
            archivosSeeder::class,
            archivosSisSeeder::class,
            criteriosSeeder::class,
            indicador_criterios::class,
            permisosSeeder::class,
            userSeeder::class,
            asignacionesSeeder::class
        ]);
    }
}
