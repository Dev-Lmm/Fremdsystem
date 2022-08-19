<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cursos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        

        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        Cursos::create( [
            'name' => 'Ingles',
            'nivel' => '1',
            'calificacion_final' => '70',
            'calificacion_actividad' => '80',
            'actividad' => 'reading',
            'maestro' => 'victor garcia',
            'cupo' => '40',
            'user_id' => '1'
        ] );

        User::create([
            'name' => 'Alumno',
            'email' => 'alumno@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Alumno');

        User::factory(9)->create();
        Cursos::factory( 2 )->create();
        
    }
}