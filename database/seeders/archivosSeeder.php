<?php

namespace Database\Seeders;

use App\Models\archivo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class archivosSeeder extends Seeder
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
                'nombre' => 'Resolucion Congreso Xii_tarija.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 1,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Estatuto Organico De La Umss.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 1,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Xiicongresonacionaluniversidades.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 1,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Resolucion Creacion Sis.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 2,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Estatuto Organico Del Sistema De Universidades Bolivianas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 3,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Plan De Desarrollo Umss 2014-2019.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 3,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Reglamentos De Movilidad Estudiantil, Cursos Y Trámites P2',
                'tipo' => 'folder',
                'indicador_id' => 4,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Reglamentos De Área Académica Docente',
                'tipo' => 'folder',
                'indicador_id' => 4,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Reglamentos De Becas Universitarias Y Comedor',
                'tipo' => 'folder',
                'indicador_id' => 4,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Reglamentos Del Área De Investigación',
                'tipo' => 'folder',
                'indicador_id' => 4,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Reglamentos De Movilidad Estudiantil, Cursos Y Trámites',
                'tipo' => 'folder',
                'indicador_id' => 4,
                'folder_id'=> null,
            ],
            [
                'nombre' => 'Estudios Simultaneos.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Examen De Gracia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Estudiantes Itinerantes.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Convalidaciones.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Certificado Notas Ptaang.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Reglamento De Cursos De Temporada.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Red803~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Ref82c~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Reglamento Admision Estudiantil.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Progra~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 7,
            ],
            [
                'nombre' => 'Reglamento para la dotacion de computadoras.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Reb7b9~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Reglamento Del Programa De Movilidad Docente.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Re918a~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Reglamento_Incorporación_Profesionales_Doctores_PhD_UMSS.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Reglamento De La Docencia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Re1ce6~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Reglam~3.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 8,
            ],
            [
                'nombre' => 'Re0b93~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 9,
            ],
            [
                'nombre' => 'REGLAMENTO ESPECÍFICO DE BECAS.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 9,
            ],
            [
                'nombre' => 'REGLAMENTO DE ADMISION Y PERMANENCIA DE LOS COMENSALES UNIVERSITARIOS.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 9,
            ],
            [
                'nombre' => 'Reglam~3.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 9,
            ],
            [
                'nombre' => 'Reglamento De Becas Para Deportistas De La Umss.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 9,
            ],
            [
                'nombre' => 'Reglamento Del Personal De Investigacion.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 10,
            ],
            [
                'nombre' => 'REGLAMENTOGENERAL DE LA INVESTIGACION CIENTIFICA Y TECNOLOGICA.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 10,
            ],
            [
                'nombre' => 'Certificacion De Notas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Certificado Notas Ptaang.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Admision Nuevos.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Cambio E Insercion De Notas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Certificado De Estudios.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Cambio De Carrera.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Admisiones En Lote.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Admision Extranjeros.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Admisiones Especiales.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            [
                'nombre' => 'Admisiones Directas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 4,
                'folder_id'=> 11,
            ],
            
        ];

        foreach ($archivos as $archivo) {
            archivo::create([
                'indicador_id' => $archivo['indicador_id'],
                'nombre' => $archivo['nombre'],
                'tipo' => $archivo['tipo'],
                'folder_id'=>$archivo['folder_id']
            ]);

          
           // File::makeDirectory('',0777,true,true);
        }
    }
}
