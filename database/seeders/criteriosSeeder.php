<?php

namespace Database\Seeders;

use App\Models\criterio;
use Illuminate\Database\Seeder;

class criteriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterios=[
            [
                'nombre'=>'Existencia',
                'descripcion'=>'Criterio de evaluación que se basa en una verificación física sobre la presencia real de
                determinados objetos'
            ],
            [
                'nombre'=>'Pertinencia',
                'descripcion'=>'Criterio de evaluación que tiene como base principal la correspondencia que debe existir entre las
                actividades, políticas, objetivos que desarrolla al presente la institución'
            ],
            [
                'nombre'=>'Eficiencia',
                'descripcion'=>'Es el criterio que permite valorar el rendimiento de los recursos utilizados, considerando
                una combinación óptima de los recursos disponibles, minimizando los esfuerzos.
                '
            ],
            [
                'nombre'=>'Eficacia',
                'descripcion'=>'La eficacia se evalúa a través de la relación
                resultados / objetivos o metas bajo condiciones ideales, es decir, bajo condiciones de
                máximo acondicionamiento para alcanzar un objetivo o meta y éste se logra.'
            ]
        ];

        foreach ($criterios as $criterio) {
            criterio::create([
                'nombre'=>$criterio['nombre'],
                'descripcion'=>$criterio['descripcion']
            ]);
        }
    }
}
