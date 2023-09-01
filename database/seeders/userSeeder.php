<?php

namespace Database\Seeders;

use App\Models\rol;
use App\Models\User;
use App\Models\rol_user;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $rolSuperAdmin= rol::create(['name'=>'superadmin']);
        $rolAdmin = rol::create(['name' => 'administrador']);

        $superAdmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('dekumentor'),
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'carrera_id'=>8,
            'email' => 'admin@admin.com',
            'password' => bcrypt('dekumentor'),
        ]);


        $asignRolAdmin=rol_user::create([
            'rol_id'=>$rolAdmin->id,
            'user_id'=>$admin->id
        ]);
        $asignRolSAdmin=rol_user::create([
            'rol_id'=>$rolSuperAdmin->id,
            'user_id'=>$superAdmin->id
        ]);
     
        $this->command->info("Administrator User created with email {$admin->email} and password dekumentor");
        $this->command->info("SuperAdministrator User created with email {$superAdmin->email} and password dekumentor");
    }
}
