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
                'nombre' => '2008060 - Calculo Numerico - Juchani Bazualdo Demetrio.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 60,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010206 - Métodos Y Técnicas De Programación - Costas Jauregui Vladimir.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 60,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010015 - Base De Datos I - Salazar Anaya Rose Mary.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 61,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010018 - Sistemas De Información I - Salazar Serrudo Carla.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 61,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010015 - Base De Datos I - Calancha Navia Boris.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 61,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Taller De Sistemas Operativos.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 61,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Contabilidad Basica - Aranibar La Fuente Ligia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 61,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Aplicación De Sistemas Operativos - Cussi Nicolás Grover.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 62,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010022 - Sistemas De Información Ii - Flores Solíz Marcelo.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 62,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010017 - Taller De Sistemas Operativos - Orellana Araoz Jorge.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 62,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010201 - Inteligencia Artificial I - Rodríguez Bilbao Patricia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 62,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Simulación De Sistemas - Villarroel Tapia Henrry Frank.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010020 - Ingeniería De Software - Camacho Del Castillo Indira.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010053 - Taller De Base De Datos - Calancha Navia Boris.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010053 - Taller De Base De Datos - Flores Solíz Marcelo.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010047 - Redes De Computadoras - Orellana Araoz Jorge.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Redes De Computadoras.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 63,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Dinamica De Sistemas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 64,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010024 - Taller De Ingenieria De Software - Azero Alcocer Pablo.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 64,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Taller De Simulación De Sistemas - Villarroel Tapia Henrry Frank.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 65,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2010102 - Evaluación Y Auditoria De Sistemas - Romero Rodríguez Patricia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 65,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Data Warehouse - Calancha Navia Boris.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 66,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Modelación Y Construcción De Sistemas Autónomos - Rodríguez Bilbao Patricia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 66,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Objetos Distribuidos - Blanco Coca Leticia.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 66,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Base De Datos Distribuidos - Montoya Burgos Yony.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 66,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Aplicaciones Web Avanzadas - Villarroel Novillo Jimmy.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 66,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Reglamentoconvalidacionessis-Marzo2018.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 55,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Plan Sistemas_19_09_18.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 11,
                'folder_id'=> 55,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Correspondencia Plan Estudios Con Sectoriales.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 12,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2 AnÁlisis Comparativo De Planes De Estudio.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 12,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Plan De Desarrollo',
                'tipo' => 'folder',
                'indicador_id' => 12,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '4_plan EstratÉgico De Desarrollo De La Fcyt.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 12,
                'folder_id'=> 109,
                'carrera_id'=>8
            ],
            [
                'nombre' => '4cronograma Gestion 2-2016.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '10cronograma Gestion 2-2019.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '9cronograma Gestion 1-2019.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3cronograma Gestion 1-2016.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '6cronogramagestion 2-2017.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2cronogramagestion 1-2015.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '5cronograma Pendiente 1-2017.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1gronogrmagestion 2-2014.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 15,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Cronogramagestion1-2021.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 16,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Cronogramagestion1-2020 V2.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 16,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Cronogramagestion2-2020.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 16,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3.4 Cumplimiento Del Plan De Estudios.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 16,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Oferta Horarios',
                'tipo' => 'folder',
                'indicador_id' => 16,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '411702.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 16,
                'folder_id'=> 123,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Organizacion De Asignaturas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 13,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'PLAN DE ESTUDIOS.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 14,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '3.5 Métodos De Enseñanza Aprendizaje.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 17,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Asiste~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 17,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Taller Areas_asig_sis_inf_09_2019',
                'tipo' => 'folder',
                'indicador_id' => 17,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Inform~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 17,
                'folder_id'=> 129,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Lista Programas_2018.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 18,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Informacion Equipo De Computacion.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 18,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '411702.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 19,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Horario De Docentes De Proyecto De Grado.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 19,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Reglamentotitulacioncarrerasnuevo_2018.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 20,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Reglamento Graduacion Diplomado.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 20,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Licenciatura-En-Ingenieria-De-Sistemas-Final.Compressed.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 20,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Ingr_tit_est.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 21,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Organigrama_inf Y Sis.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 22,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Organigrama_fcyt.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 22,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Actualizado Organi Infor_sis.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 22,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Org_lab.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 22,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => '4.1 Administración Académica.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Registro_estudiantes.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Centro De Procesamiento De Datos',
                'tipo' => 'folder',
                'indicador_id' => 23,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Respon~2.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> 145,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Respon~3.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> 145,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Respon~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> 145,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Auxili~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> 145,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Auxili~2.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 23,
                'folder_id'=> 145,
                'carrera_id'=>8
            ],
            [
                'nombre' => '10_est~1.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Poa_2018',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Formulacion De Poa',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Informe Final Poa2018 Hfernandez',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Informe Final Poa 2018 Rjaldin',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Informe-Poa-2018-Vladimircostas',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Informes De Media Gestion',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Ing. Ayoroa',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Ing. Villarroel',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Lic. Jaldín',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Poa 2018 Rjaldin',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Poa 2018 Vcostas',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 152,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc(5).pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc(2).pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc(1).pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc(4).pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc(3).pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Doc.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Carpeta Proyectos',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 153,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Helder Fernandez',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Jimmy Villarroel',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Jorge Orellana',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Richard Ayoroa',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Rolando Jaldin',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Vladimir Costas',
                'tipo' => 'folder',
                'indicador_id' => 24,
                'folder_id'=> 169,
                'carrera_id'=>8
            ],
            [
                'nombre' => '4.2 Organismos De Decisión.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones Honorable Consejo De Carrera',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones Honorable Consejo Facultativo',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> null,
                'carrera_id'=>null
            ],
            [
                'nombre' => 'Resoluciones 2014',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 177,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones 2015',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 177,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones 2016',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 177,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones 2017',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 177,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoluciones 2018',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 177,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoli~12014.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 179,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resoli~12015.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 180,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resolu~12016.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 181,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resolu~12017.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 182,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resolu~12018.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 183,
                'carrera_id'=>8
            ],
            [
                'nombre' => '1_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '6_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '8_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '5_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '4_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '7_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '9_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '11_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>8
            ],
            [
                'nombre' => '2_reso~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => 'Parte 2',
                'tipo' => 'folder',
                'indicador_id' => 26,
                'folder_id'=> 178,
                'carrera_id'=>null
            ],
            [
                'nombre' => '14_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 198,
                'carrera_id'=>null
            ],
            [
                'nombre' => '21_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 198,
                'carrera_id'=>null
            ],
            [
                'nombre' => '13_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 198,
                'carrera_id'=>null
            ],
            [
                'nombre' => '22_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 198,
                'carrera_id'=>null
            ],
            [
                'nombre' => '12_res~1HCF.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 26,
                'folder_id'=> 198,
                'carrera_id'=>null
            ],
            [
                'nombre' => 'Director Sistemas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Organigrama_inf Y Sis.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Investigador.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Jefatura_dpto.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Mensajero.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Jefe Dpto Infor_sistema.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Direccion Carrera_sistemas.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Laboratorios De Computo',
                'tipo' => 'folder',
                'indicador_id' => 38,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Org_lab.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Aux_lab_mante.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Caratula.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Auxi_lab_centro_com.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Aux_lab_desa.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resp_lab_desa.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Admin_ Lab.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Resp_lab_mante.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 38,
                'folder_id'=> 211,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Ingr_tit_est.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 39,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Reglamentotitulacioncarrerasnuevo.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 39,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Horario De Docentes De Proyecto De Grado.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 40,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            [
                'nombre' => 'Escáner_20191210.pdf',
                'tipo' => 'archivo',
                'indicador_id' => 41,
                'folder_id'=> null,
                'carrera_id'=>8
            ],
            ];
        foreach ($archivos as $archivo) {
            archivo::create([
                'indicador_id' => $archivo['indicador_id'],
                'nombre' => $archivo['nombre'],
                'tipo' => $archivo['tipo'],
                'folder_id'=>$archivo['folder_id'],
                'carrera_id'=>$archivo['carrera_id']
            ]);

          
           // File::makeDirectory('',0777,true,true);
        }
    }
}
