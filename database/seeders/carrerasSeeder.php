<?php

namespace Database\Seeders;

use App\Models\carrera;
use Illuminate\Database\Seeder;

class carrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreras=[
            [
                'nombre'=>'LICENCIATURA DIDACTICA MATEMATICA',
                'codigo'=>'114071'
            ],
            [
                'nombre'=>'LICENCIATURA EN BIOLOGIA',
                'codigo'=>'399501'
            ],
            [
                'nombre'=>'LICENCIATURA EN DIDACTICA DE LA FISICA',
                'codigo'=>'760101'
            ],
            [
                'nombre'=>'LICENCIATURA EN FISICA',
                'codigo'=>'359201'
            ],
            [
                'nombre'=>'LICENCIATURA EN ING. ELECTROMECANICA',
                'codigo'=>'650001'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA CIVIL (NUEVO)',
                'codigo'=>'320902'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA DE ALIMENTOS',
                'codigo'=>'409701'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA DE SISTEMAS',
                'codigo'=>'419701'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA DE SISTEMAS',
                'codigo'=>'299701'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA ELECTRICA',
                'codigo'=>'114071'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA ELECTRONICA',
                'codigo'=>'429701'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA EN ENERGIA',
                'codigo'=>'166231'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA INDUSTRIAL',
                'codigo'=>'309801'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA INFORMATICA',
                'codigo'=>'134111'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA MATEMATICA',
                'codigo'=>'439801'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA MECANICA',
                'codigo'=>'319801'
            ],
            [
                'nombre'=>'LICENCIATURA EN INGENIERIA QUIMICA',
                'codigo'=>'339701'
            ],
            [
                'nombre'=>'LICENCIATURA EN MATEMATICAS',
                'codigo'=>'349701'
            ],
            [
                'nombre'=>'LICENCIATURA EN QUIMICA',
                'codigo'=>'389701'
            ],
            [
                'nombre'=>'PROGRAMA DE INGENIERIA EN BIOTECNOLOGIA',
                'codigo'=>'165221'
            ],
        ];
foreach ($carreras as $carrera) {
 carrera::create([
    'name'=>$carrera['nombre'],
    'codigo'=>$carrera['codigo']
 ]);
}
    }
}
