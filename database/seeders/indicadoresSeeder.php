<?php

namespace Database\Seeders;

use App\Models\indicador;
use App\Models\variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class indicadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicadores = [
            [
                'description' => 'Estatuto Organico de la Universidad',
                'type' => 'RMA',
                'weight' => 2,
                
                'variable_id' => 1,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Resoluciones que autorizan el funcionamiento del Programa',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 2,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Plan de Desarrollo Institucional',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 3,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Reglamentos generales y especificos',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 4,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Manuales de organizacion y funciones',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 5,
                'indicator_number' => 1,
                 
            ],
            // END AREA
            [
                'description' => 'Mision de la Universidad',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 6,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Mision de la Carrera',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 7,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Objetivos de la Carrera',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 8,
                'indicator_number' => 1,
                 
            ],
            // END AREA
            [
                'description' => 'El Plan de Estudios debe establecer el perfil profesional en forma clara, con una descripcion general de conocimientos, habilidades, actitudes y valores que debera tener un estudiante al titularse',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 9,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'El plan de estudios debe corresponder a los criterios establecidos en las Reuniones Sectoriales del area, ademas debe estar actualizado de acuerdo a los avances cientificos y tecnologicos de la Ingenieria',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 9,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Los objetivos del plan de estudios deben estar claramente formulados de tal manera que permitan alcanzar el perfil profesional y los objetivos de la carrera',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 10,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La institucion debe demostrar que organiza y desarrolla el plan de estudios con base en los objetivos generales y especificos contenidos en el plan de desarrollo institucional o sus planes operativos anuales',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 10,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'El programa debe tener la siguiente proporcion de materias, areas o modulos en la estructura de la oferta curricular:Ciencias Basicas  25% a 30%,Ciencias de la Ingenieria 30% a 35%,Ingenieria Aplicada 20% a 30%,Ciencias Sociales  Humanisticas  5% a  8%,Otros cursos  3% a  7%,Sin tomar en cuenta las horas destinadas a la modalidad de graduacion.',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 11,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'El programa debe tener una carga horaria de 4.500 a 6.000 horas academicas (sin considerar la modalidad de graduacion) y tener una eficiente proporcion de materias, areas o modulos en a estructura curricular de acuerdo a las determinaciones de la Sectorial respectiva',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 11,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Regularidad academica en cuanto al cumplimiento de los calendarios',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 12,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe demostrarse que se cumple por lo menos con el 90% del contenido de los planes globales de cada asignatura del plan de estudios',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 12,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Debe demostrarse que se utiliza metodos de formacion de acuerdo al avance de la ciencia y la tecnologia',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 13,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe demostrarse que se incluye el uso de la computadora en el proceso de ensenanza y aprendizaje, por lo menos 4 horas a la semana a lo largo de la carrera',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 13,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Debe demostrarse que las modalidades de graduacion estan contempladas dentro del plan de estudios y son de aplicacion continua',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 14,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe demostrarse que se proporciona a los estudiantes las opciones de titulacion vigentes en el Sistema y la eficiencia de las mismas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 14,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Debe demostrarse que la aplicacion de las modalidades de graduacion contribuye a complementar la formacion profesional y mejorar la eficiencia terminal',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 14,
                'indicator_number' => 3,
                 
            ],
            // END AREA
            [
                'description' => 'La unidad que administra el programa debe demostrar que esta organizada adecuadamente como para cumplir con sus objetivos y metas',
                'type' => 'RMA',
                'weight' => 2,
             
                'variable_id' => 15,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La unidad que administra el programa tiene un sistema de registro, transcripcion, control y certificacion de calificaciones, con la mas alta confiabilidad, seguridad y eficacia',
                'type' => 'RMA',
                'weight' => 2,
             
                'variable_id' => 15,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La unidad que administra el programa tiene un sistema de evaluacion que le permite medir el cumplimiento de sus objetivos y mejorar permanentemente su calidad',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 15,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'La carrera debe tener un sistema idoneo y garantizado para la tramitacion y extension de titulos',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 15,
                'indicator_number' => 4,
                 
            ],
            [
                'description' => 'La unidad que administra el programa debe demostrar que adopta decisiones concernientes al funcionamiento del programa oportunamente y de acuerdo a las normas institucionales',
                'type' => 'RMA',
                'weight' => 2,
             
                'variable_id' => 16,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe demostrarse que las decisiones adoptadas contribuyen a mejorar la eficiencia y eficacia del programa',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 16,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Identificacion',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 17,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Justificacion',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 17,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Objetivos',
                'type' => 'RMA',
                'weight' => 2,
             
                'variable_id' => 17,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Seleccion y organizacion de contenidos tematicos',
                'type' => 'RMA',
                'weight' => 2,
            
                'variable_id' => 17,
                'indicator_number' => 4,
                 
            ],
            [
                'description' => 'Metodologia de ensenanza',
                'type' => 'RMA',
                'weight' => 2,
           
                'variable_id' => 17,
                'indicator_number' => 5,
                 
            ],
            [
                'description' => 'Cronograma',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 17,
                'indicator_number' => 6,
                 
            ],
            [
                'description' => 'Criterios de evaluacion',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 17,
                'indicator_number' => 7,
                 
            ],
            [
                'description' => 'Bibliografia',
                'type' => 'RMA',
                'weight' => 2,
             
                'variable_id' => 17,
                'indicator_number' => 8,
                 
            ],
            [
                'description' => 'Debe demostrarse que los grupos o cursos formados para cada asignatura no sobrepasen de 100 estudiantes para el ciclo basico y 45 en los restantes',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 18,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La relacion docente - estudiante de la carrera debe ser tal que le permita una adecuada atencion a todas las actividades programadas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 18,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'El total del personal administrativo debe ser el optimo como para garantizar una atencion adecuada a todos los procesos academicos',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 19,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Razonable proporcion en la relacion de titulacion - ingreso de los estudiantes',
                'type' => 'RMA',
                'weight' => 2,
              
                'variable_id' => 20,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Razonable proporcion en la relacion de titulados - docentes del programa de acuerdo a sus objetivos curriculares',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 20,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La Carrera o el Programa debe demostrar su grado de impacto a traves de un seguimiento respecto a la ubicacion y actividades que desempenan sus titulados',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 20,
                'indicator_number' => 3,
                 
            ],
            // END AREA
            [
                'description' => 'Por lo menos el 25% de los docentes deben contar con grado academico de postgrado: Diplomados, Especialistas, Magisters y/o Doctores (en el area de conocimiento especifico)',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 21,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Los docentes del programa en general debe tener un grado academico licenciado o superior y contar por lo menos con un grado de Diplomado en Educacion Superior o su equivalente',
                'type' => 'RMA',
                'weight' => 2,
            
                'variable_id' => 21,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'El programa debe tener docentes titulares de por lo menos el 60% del plantel docente',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 21,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Por lo menos el 30% de las materias basicas deben ser impartidas por docentes formados en esas areas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 22,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Por lo menos el 40% de las asignaturas de Ciencias de la Ingenieria deben ser impartidas por docentes a tiempo completo, que tengan por lo menos, el grado de Maestria',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 22,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Por lo menos el 40% de las asignaturas de Ciencias Basicas deben ser impartidas por docentes a tiempo completo',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 22,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Por lo menos el 50% de las materias correspondientes a Ciencias Sociales y Humanidades deben ser impartidas por docentes de esas disciplinas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 22,
                'indicator_number' => 4,
                 
            ],
            [
                'description' => 'Debe existir una adecuada distribucion de las actividades de los docentes a tiempo completo, que tome en cuenta la atencion a los estudiantes, asi como asesorias y tutorias para la graduacion',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 22,
                'indicator_number' => 5,
                 
            ],
            [
                'description' => 'Los docentes en general debe contar con una experiencia profesional no menor a 5 anos en el campo de la ingenieria y por lo menos el 50% del plantel docente debe tener una experiencia academica no menor a 5 anos de ejercicio de la docencia',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 23,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Por lo menos el 20% de las materias de Ingenieria Aplicada deben ser impartidas por docentes con experiencia de 10 anos como minimo en el area correspondiente y contar por lo menos con el grado de Maestria',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 23,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La admision de los docentes ordinarios debe ser resultado de un proceso de seleccion y admision a traves de concurso de meritos y examen de competencia, sujeto a reglamentacion',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 24,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La permanencia de los docentes debe sujetarse a un proceso reglamentado que prevea por lo menos una evaluacion docente anual',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 24,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La institucion debe demostrar que, en general, existen resultados satisfactorios de la evaluacion docente realizada anualmente con el proposito de verificar el nivel de cumplimiento de sus funciones docentes',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 25,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Los docentes deben participar en gestion, planificacion academica y evaluacion',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 25,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Los docentes producen textos, guias y otros materiales de apoyo a la catedra',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 25,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Los docentes participan como tutores, asesores y tribunales en las modalidades de graduacion programadas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 25,
                'indicator_number' => 4,
                 
            ],
//            // END AREA
            [
                'description' => 'Los estudiantes ingresan al programa cumpliendo con una de las modalidades de admision del sistema: Prueba de Suficiencia Academica o Curso Pre-universitario, en funcion de la capacidad fisica disponible de la carrera y de acuerdo a las recomendaciones del area',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 26,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'El programa debe demostrar que los estudiantes admitidos cumplen con un minimo de condiciones en cuanto a conocimientos, aptitudes y habilidades',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 26,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La matricula total debe estar en funcion de las previsiones establecidas en el plan de desarrollo de la institucion y de su capacidad fisica disponible',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 27,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe tener un sistema de evaluacion de aprendizajes que debe ser: sistematico, diagnostico, continuo, formativo, progresivo, coherentemente planificado y sumativo',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 28,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe demostrarse que el numero de examenes y procedimientos de evaluacion estan determinados en los planes globales de cada asignatura, los mismos que deben ser de conocimiento de los estudiantes',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 28,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Debe demostrarse que los conocimientos adquiridos por los estudiantes corresponden al nivel de formacion esperado de acuerdo al plan de estudios vigente',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 28,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Se debe establecer un limite en la repeticion de asignaturas de acuerdo a las politicas de permanencia establecidos en el plan de desarrollo y demostrar su cumplimiento',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 29,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe establecer un tiempo total de permanencia de acuerdo a las politicas de graduacion establecidas en el plan de desarrollo',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 29,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Se debe demostrar que se dispone de mecanismos y facilidades que permitan a los estudiantes cumplir con una de las modalidades de graduacion de manera adecuada y oportuna',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 30,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La institucion debe contar con servicios de apoyo a los estudiantes de acuerdo a las previsiones establecidas en su plan de desarrollo',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 31,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe tener un sistema de reconocimiento a los estudiantes que demuestren un alto rendimiento en su proceso de formacion',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 32,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe tener un sistema de becas que beneficie a los estudiantes que demuestren altos rendimientos academicos y sean de escasos recursos economicos',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 32,
                'indicator_number' => 2,
                 
            ],
//            // END AREA
            [
                'description' => 'La Carrera debe tener politicas claras sobre lineas de investigacion y desarrollo tecnologico a desarrollarse en cada gestion academica',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 33,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Los docentes y estudiantes deben participar activamente en los procesos de investigacion e interaccion social',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 34,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe demostrar que los trabajos de grado fueron parte de las tareas de investigacion l al menos en un 20%',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 35,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe contar con actividades formales de vinculacion con los sectores social y productivo',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 36,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe demostrar resultados positivos de las actividades de interaccion social; socializacion de acciones comunitarias, campanas, servicios y otros',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 36,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Se debe demostrar la existencia de resultados favorables de proyectos de investigacion transferidos al sector productivo',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 37,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe demostrar que se tienen proyectos ejecutados y en plena ejecucion en lineas de investigacion de interes comun entre la Universidad y otras instituciones',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 37,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Debe existir un numero racional de proyectos de investigacion concluidos y publicados',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 38,
                'indicator_number' => 1,
                 
            ],
//            // END AREA
            [
                'description' => 'Bibliografia especializada y adecuada, segun el programa que se imparte. Debe contar por lo menos con cinco titulos diferentes por cada asignatura y al menos tres libros por estudiante',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 39,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Existencia imprescindible de equipos en los laboratorios y gabinetes pertinentes al programa (el detalle de laboratorios para cada Carrera o Programa sera incorporado en las guias y manuales correspondientes)',
                'type' => 'RMA',
                'weight' => 2,
                'variable_id' => 40,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Existencia imprescindible de equipos didacticos adecuados, suficientes y disponibles para desarrollar los procesos de ensenanza – aprendizaje',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 41,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe contar con computadoras o terminal instaladas en las salas de estudio y bibliotecas con acceso a redes de informacion especializadas, internet y correo electronico (por lo menos una por cada 20 estudiantes)',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 42,
                'indicator_number' => 1,
                 
            ],
//            // END AREA
            [
                'description' => 'El presupuesto asignado a la carrera o programa debe ser tal que garantice su funcionamiento, asegure su continuidad y el mejoramiento sostenido de su calidad',
                'type' => 'RMA',
                'weight' => 2,
                
                'variable_id' => 43,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Los recursos destinados al programa deben ser suficientes como para contratar, mantener e incentivar el desarrollo academico de un plantel docente calificado',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 44,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Los recursos asignados al programa deben ser suficientes como para adquirir, mantener y facilitar la operacion de un equipamiento apropiado al proceso de ensenanza - aprendizaje',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 44,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'La Administracion Financiera debe regirse a los principios, normas y disposiciones legales vigentes',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 44,
                'indicator_number' => 3,
                 
            ],
            [
                'description' => 'Se debe demostrar que el costo por estudiante en relacion a su rendimiento es optimo',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 45,
                'indicator_number' => 1,
                 
            ],
//            // END AREA
            [
                'description' => 'La carrera debe tener aulas propias, suficientes, equipadas y estar acondicionadas para recibir a los estudiantes con un minimo de 1.2 m2 por estudiante y buenas condiciones de iluminacion',
                'type' => 'RMA',
                'weight' => 2,
               
                'variable_id' => 46,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La carrera debe tener suficiente numero de ambientes y espacios para disponer toda la bibliografia existente y brindar atencion a docentes y estudiantes para el prestamo y consultas en sala',
                'type' => 'RMA',
                'weight' => 2,
                
                'variable_id' => 47,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Debe tener el numero apropiado de salas de formacion academica, laboratorios y gabinetes con una superficie suficiente para el desarrollo de sus actividades',
                'type' => 'RMA',
                'weight' => 2,
                 
                'variable_id' => 48,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'La carrera debe contar con oficinas y areas de servicio suficientes y equipadas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 49,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe contar con espacios propios o compartidos para realizar practicas deportivas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 49,
                'indicator_number' => 2,
                 
            ],
            [
                'description' => 'Los docentes a tiempo completo deben disponer de un ambiente apropiado, mobiliario y equipo necesario para desarrollar su trabajo permanentemente',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 50,
                'indicator_number' => 1,
                 
            ],
            [
                'description' => 'Se debe contar con espacio propio para reuniones trabajo, seminarios, talleres y conferencias en numero suficiente y en condiciones apropiadas',
                'type' => 'RC',
                'weight' => 1,
                 
                'variable_id' => 50,
                'indicator_number' => 2,
                 
            ],
        ];

        foreach ($indicadores as $indicador) {
           indicador::create([
                'descripcion'=>$indicador['description'],
                'variable_id'=>$indicador['variable_id'],
                'numero_indicador'=>$indicador['indicator_number'],
                'tipo'=>$indicador['type'],
                'peso'=>$indicador['weight'],
           ]);

          // $variable=variable::find($indicador['variable_id']);
          // $caracteres_noaceptados=array("/","\\",":","*","?",'"',"<",">","|");
          // $ruta=storage_path('app/public/files/'. str_replace(' ','_',$variable->area->name).'/'.str_replace(' ','_',$variable->name).'/'.str_replace($caracteres_noaceptados,'_',$indicador['description']));
          // File::makeDirectory($ruta,0777,true,true);
        }
    }
}
