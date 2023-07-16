<?php

namespace Database\Seeders;

use App\Models\archivo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class archivosSisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $archivos = [
            [
                'nombre' => 'Carreras De Informática Y Sistemas --- Umss.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 9,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '02_plan Estudios Sistemas 2017.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 9,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Ingsistemas-Pdf.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 9,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3.1 Perfil Profesional.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 9,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3.1.2 Correspondencia Con Criterios Establecidos En Reunion Sectorial Del Area.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 10,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2estudio De Mercado Sistemas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 10,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2bases Epistemologicas Sistemas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 10,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3.2.1 Objetivos Del Programa.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1 Malla Y Plan Estudios 19_09_18.2.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Planes Globales',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Rediseño De La Malla Curricular',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            ];
        foreach ($archivos as $archivo) {
            archivo::create([
                'numero_area' => $archivo['area_number'],
                'name' => $archivo['label'],
                'valor' => $archivo['weight'],
            ]);

          
            File::makeDirectory('',0777,true,true);
        }
    }
}
