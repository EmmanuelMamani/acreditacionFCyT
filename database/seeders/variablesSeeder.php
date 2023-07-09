<?php

namespace Database\Seeders;

use App\Models\area;
use App\Models\variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class variablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variables = [
            [
                'variable_number' => 1,
                'label' => 'Estatuto Organico de la Universidad',
                'area_id' => 1,
            ],
            [
                'variable_number' => 2,
                'label' => 'Resoluciones que autorizan el funcionamiento del Programa',
                'area_id' => 1,
            ],
            [
                'variable_number' => 3,
                'label' => 'Plan de Desarrollo Institucional',
                'area_id' => 1,
            ],
            [
                'variable_number' => 4,
                'label' => 'Reglamentos generales y especificos',
                'area_id' => 1,
            ],
            [
                'variable_number' => 5,
                'label' => 'Manuales de organizacion y funciones',
                'area_id' => 1,
            ],
            // END AREA
            [
                'variable_number' => 1,
                'label' => 'Mision de la Universidad',
                'area_id' => 2,
            ],
            [
                'variable_number' => 2,
                'label' => 'Mision de la Carrera',
                'area_id' => 2,
            ],
            [
                'variable_number' => 3,
                'label' => 'Objetivos de la Carrera',
                'area_id' => 2,
            ],
            // END AREA
            [
                'variable_number' => 1,
                'label' => 'Perfil profesional',
                'area_id' => 3,
            ],
            [
                'variable_number' => 2,
                'label' => 'Objetivos del Plan de Estudios',
                'area_id' => 3,
            ],
            [
                'variable_number' => 3,
                'label' => 'Organizacion de asignaturas y distribucion de horas academicas',
                'area_id' => 3,
            ],
            [
                'variable_number' => 4,
                'label' => 'Cumplimiento de los Planes de Estudio',
                'area_id' => 3,
            ],
            [
                'variable_number' => 5,
                'label' => 'Metodos de ensenanza – aprendizaje',
                'area_id' => 3,
            ],
            [
                'variable_number' => 6,
                'label' => 'Modalidades de graduacion',
                'area_id' => 3,
            ],
            // END AREA
            [
                'variable_number' => 1,
                'label' => 'Administracion Academica',
                'area_id' => 4,
            ],
            [
                'variable_number' => 2,
                'label' => 'Organismos y niveles de decision',
                'area_id' => 4,
            ],
            [
                'variable_number' => 3,
                'label' => 'Planes globales por asignatura',
                'area_id' => 4,
            ],
            [
                'variable_number' => 4,
                'label' => 'Relaciones docente – estudiante por bloques, modulos y programas',
                'area_id' => 4,
            ],
            [
                'variable_number' => 5,
                'label' => 'Apoyo administrativo',
                'area_id' => 4,
            ],
            [
                'variable_number' => 6,
                'label' => 'Resultados e impacto',
                'area_id' => 4,
            ],

            ['variable_number' => 1, 'label' => 'Grado academico y categoria de los docentes','area_id' => 5,],
            ['variable_number' => 2, 'label' => 'Docentes segun tiempo de dedicacion y asignatura','area_id' => 5,],
            ['variable_number' => 3, 'label' => 'Experiencia academica y profesional de los docentes','area_id' => 5,],
            ['variable_number' => 4, 'label' => 'Admision y permanencia docente','area_id' => 5,],
            ['variable_number' => 5, 'label' => 'Desempeno docente','area_id' => 5,],

            ['variable_number' => 1, 'label' => 'Admision','area_id' => 6,],
            ['variable_number' => 2, 'label' => 'Caracteristicas de la poblacion estudiantil','area_id' => 6,],
            ['variable_number' => 3, 'label' => 'Evaluacion del aprendizaje','area_id' => 6,],
            ['variable_number' => 4, 'label' => 'Permanencia','area_id' => 6,],
            ['variable_number' => 5, 'label' => 'Graduacion','area_id' => 6,],
            ['variable_number' => 6, 'label' => 'Servicios de bienestar estudiantil','area_id' => 6,],
            ['variable_number' => 7, 'label' => 'Reconocimientos y becas','area_id' => 6,],

            ['variable_number' => 1, 'label' => 'Politicas de investigacion y desarrollo cientifico','area_id' => 7,],
            ['variable_number' => 2, 'label' => 'Participacion de docentes y estudiantes','area_id' => 7,],
            ['variable_number' => 3, 'label' => 'Trabajo de investigacion','area_id' => 7,],
            ['variable_number' => 4, 'label' => 'Politicas de interaccion social','area_id' => 7,],
            ['variable_number' => 5, 'label' => 'Proyectos de investigacion','area_id' => 7,],
            ['variable_number' => 6, 'label' => 'Publicaciones','area_id' => 7,],

            ['variable_number' => 1, 'label' => 'Bibliografia','area_id' => 8,],
            ['variable_number' => 2, 'label' => 'Equipos en laboratorios y gabinetes','area_id' => 8,],
            ['variable_number' => 3, 'label' => 'Equipos didacticos','area_id' => 8,],
            ['variable_number' => 4, 'label' => 'Equipos de computacion','area_id' => 8,],

            ['variable_number' => 1, 'label' => 'Ejecucion presupuestaria','area_id' => 9,],
            ['variable_number' => 2, 'label' => 'Politicas de asignacion de recursos','area_id' => 9,],
            ['variable_number' => 3, 'label' => 'Costos','area_id' => 9,],

            ['variable_number' => 1, 'label' => 'Aulas','area_id' => 10,],
            ['variable_number' => 2, 'label' => 'Bibliotecas','area_id' => 10,],
            ['variable_number' => 3, 'label' => 'Salas de formacion academica:  Laboratorios y gabinetes','area_id' => 10,],
            ['variable_number' => 4, 'label' => 'Oficinas y areas de servicio','area_id' => 10,],
            ['variable_number' => 5, 'label' => 'Ambientes y equipos para docentes','area_id' => 10,],
        ];

        foreach ($variables as $variable) {
           variable::create([
            'name'=>$variable['label'],
            'numero_variable'=>$variable['variable_number'],
            'area_id'=>$variable['area_id']
           ]);

           $area=area::find($variable['area_id']);

           $ruta=storage_path('app/public/files/'. str_replace(' ','_',$area->name).'/'.str_replace(' ','_',$variable['label']));
           File::makeDirectory($ruta,0777,true,true);
        }
    }
}
