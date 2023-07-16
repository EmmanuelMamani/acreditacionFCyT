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
                'nombre' => '1s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '4s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '5s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '6s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '7s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '8s',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Electivas',
                'tipo' => 'folder',
                'indicador_id' => 11,
                'folder_id'=> 54,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010010 - Introducción A La Programación – Blanco Coca Leticia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2008019 - Algebra I - León Romero Ruperto.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2006085 - Laboratorio De Física Básica I - Flores Flores Freddy.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2006063 - Fisica General - Valenzuela Roberto.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1803001 – Ingles I - Grilo Salvatierra Maria Estela.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2008054 - Calculo I - Martinez Maida Amilcar.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 58,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010003 - Elementos De Programación Y Estructura De Datos - Blanco Coca Leticia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2008056 - Calculo Ii - Terrazas Lobo Juan..pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010013 - Arquitectura De Computadoras I - Blanco Coca Leticia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2008022 - Algebra Ii - Medina Gamboa Julio Cesar.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1803002 - Inglés Ii - Peeters Ilona.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1803002 - Inglés Ii - Peeters Ilona.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 59,
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
