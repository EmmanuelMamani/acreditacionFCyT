<?php

namespace Database\Seeders;

use App\Models\area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class areasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'area_number' => 1,
                'label' => 'Normas Jurídicas e Institucionales',
                'weight' => 0.5,
            ],
            [
                'area_number' => 2,
                'label' =>'Misión y Objetivos',
                'weight' => 0.5,
            ],
            [
                'area_number' => 3,
                'label' => 'Currículo',
                'weight' => 1.5,
            ],
            [
                'area_number' => 4,
                'label' => 'Administración y Gestión Academica',
                'weight' => 1,
            ],
            [
                'area_number' => 5,
                'label' => 'Docentes',
                'weight' => 2.5,
            ],
            [
                'area_number' => 6,
                'label' => 'Estudiantes',
                'weight' => 0.5,
            ],
            [
                'area_number' => 7,
                'label' => 'Investigacion e Interaccion Social',
                'weight' => 1,
            ],
            [
                'area_number' => 8,
                'label' => 'Recursos Educativos',
                'weight' => 1,
            ],
            [
                'area_number' => 9,
                'label' =>'Administracion Financiera', 
                'weight' => 0.5,
            ],
            [
                'area_number' => 10,
                'label' => 'Infraestructura',
                'weight' => 1,
            ],
        ];

        foreach ($areas as $area) {
            area::create([
                'numero_area' => $area['area_number'],
                'name' => $area['label'],
                'valor' => $area['weight'],
            ]);

            $ruta=storage_path('app/public/files/Area'. $area['area_number']);
            File::makeDirectory($ruta,0777,true,true);
        }
        

    }
}
