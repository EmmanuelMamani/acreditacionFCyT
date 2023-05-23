<?php

namespace Database\Seeders;
use App\Models\permiso_rol;
use Illuminate\Database\Seeder;

class asignacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $asignaciones=[
            ['permiso_id'=>'2','rol_id'=>'1'],
            ['permiso_id'=>'3','rol_id'=>'1'],
            ['permiso_id'=>'4','rol_id'=>'1'],
            ['permiso_id'=>'5','rol_id'=>'1'],
            ['permiso_id'=>'6','rol_id'=>'1'],
            ['permiso_id'=>'7','rol_id'=>'1'],
            ['permiso_id'=>'11','rol_id'=>'1'],
            ['permiso_id'=>'12','rol_id'=>'1'],
            ['permiso_id'=>'13','rol_id'=>'1'],
            ['permiso_id'=>'14','rol_id'=>'1'],
            ['permiso_id'=>'15','rol_id'=>'1'],
            ['permiso_id'=>'16','rol_id'=>'1'],
            ['permiso_id'=>'17','rol_id'=>'1'],
            ['permiso_id'=>'18','rol_id'=>'1'],
            ['permiso_id'=>'19','rol_id'=>'1'],
            ['permiso_id'=>'20','rol_id'=>'1'],
            ['permiso_id'=>'21','rol_id'=>'1'],
            ['permiso_id'=>'22','rol_id'=>'1'],
            ['permiso_id'=>'23','rol_id'=>'1'],
            ['permiso_id'=>'24','rol_id'=>'1'],
            ['permiso_id'=>'25','rol_id'=>'1'],
            ['permiso_id'=>'26','rol_id'=>'1'],
            ['permiso_id'=>'27','rol_id'=>'1'],
            ['permiso_id'=>'28','rol_id'=>'1'],
            ['permiso_id'=>'29','rol_id'=>'1'],
            ['permiso_id'=>'30','rol_id'=>'1'],
            ['permiso_id'=>'31','rol_id'=>'1'],
            ['permiso_id'=>'32','rol_id'=>'1'],
            ['permiso_id'=>'33','rol_id'=>'1'],
            ['permiso_id'=>'34','rol_id'=>'1'],
            ['permiso_id'=>'36','rol_id'=>'1'],
            ['permiso_id'=>'37','rol_id'=>'1'],
            ['permiso_id'=>'38','rol_id'=>'1'],
            ['permiso_id'=>'39','rol_id'=>'1'],
            ['permiso_id'=>'40','rol_id'=>'1'],
            ['permiso_id'=>'41','rol_id'=>'1'],
            ['permiso_id'=>'1','rol_id'=>'2'],
            ['permiso_id'=>'8','rol_id'=>'2'],
            ['permiso_id'=>'9','rol_id'=>'2'],
            ['permiso_id'=>'10','rol_id'=>'2'],
            ['permiso_id'=>'20','rol_id'=>'2'],
            ['permiso_id'=>'24','rol_id'=>'2'],
            ['permiso_id'=>'28','rol_id'=>'2'],
            ['permiso_id'=>'29','rol_id'=>'2'],
            ['permiso_id'=>'30','rol_id'=>'2'],
            ['permiso_id'=>'31','rol_id'=>'2'],
            ['permiso_id'=>'32','rol_id'=>'2'],
            ['permiso_id'=>'33','rol_id'=>'2'],
            ['permiso_id'=>'35','rol_id'=>'2'],
            ['permiso_id'=>'42','rol_id'=>'2'],
            ['permiso_id'=>'43','rol_id'=>'2'],
            ['permiso_id'=>'44','rol_id'=>'2']
        ];
        foreach($asignaciones as $asignacion){
            permiso_rol::create([
                'permiso_id'=>$asignacion['permiso_id'],'rol_id'=>$asignacion['rol_id']
            ]);
        }
    }
}
