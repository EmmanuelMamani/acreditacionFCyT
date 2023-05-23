<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\permiso;
class permisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos=[
            ['url'=>"menu_admin"],
            ['url'=>"reporte_permisos"],
            ['url'=>"registrar_permiso"],
            ['url'=>"reporte_permiso_rol"],
            ['url'=>"asignar_permiso"],
            ['url'=>"eliminar_asignacion"],
            ['url'=>"eliminar_permiso"],
            ['url'=>"calificacion"],
            ['url'=>"ver_calificar_area"],
            ['url'=>"calificar"],
            ['url'=>"menu_superadmin"],
            ['url'=>"reporte_carreras"],
            ['url'=>"registro_carrera"],
            ['url'=>"eliminar_carrera"],
            ['url'=>"editar_carrera"],
            ['url'=>"reporte_areas"],
            ['url'=>"registro_area"],
            ['url'=>"editar_area"],
            ['url'=>"eliminar_area"],
            ['url'=>"reporte_variables"],
            ['url'=>"registro_variable"],
            ['url'=>"editar_variable"],
            ['url'=>"eliminar_variable"],
            ['url'=>"reporte_indicadores"],
            ['url'=>"registro_indicador"],
            ['url'=>"editar_indicador"],
            ['url'=>"eliminar_indicador"],
            ['url'=>"reporte_archivos"],
            ['url'=>"registro_archivos"],
            ['url'=>"registro_folder"],
            ['url'=>"editar_folder"],
            ['url'=>"eliminar_archivo"],
            ['url'=>"eliminar_folder"],
            ['url'=>"reporte_usuarios"],
            ['url'=>"reporte_usuarios_carrera"],
            ['url'=>"registro_usuario"],
            ['url'=>"eliminar_usuario"],
            ['url'=>"editar_usuario"],
            ['url'=>"reporte_roles"],
            ['url'=>"registro_rol"],
            ['url'=>"eliminar_rol"],
            ['url'=>"reporte_gestiones"],
            ['url'=>"registro_gestion"],
            ['url'=>"activar_gestion"]
        ];
        foreach($permisos as $permiso){
            permiso::create([
                'url'=>$permiso['url']
            ]);
        }
    }
}
