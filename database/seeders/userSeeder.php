<?php

namespace Database\Seeders;

use App\Models\rol;
use App\Models\User;
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
        $rol = rol::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Usuario poderoso',
            'special' => 'all-access',
        ]);

        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'administrator@admin.com',
            'password' => bcrypt('dekumentor'),
        ]);
        $admin->assignRole($rol->id);
        $this->command->info("Administrator User created with email {$admin->email} and password dekumentor");
    }
}
