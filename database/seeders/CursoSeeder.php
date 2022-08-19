<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cursos;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $this->call( [
            Cursos::class,
        ] );

        Cursos::create( [
            'name' => 'victor garcia',
            'nivel' => '1',
            'calificacion_final' => '70',
            'calificacion_actividad' => '80',
            'actividad' => 'reading',
            'maestro' => 'victor garcia',
            'cupo' => '40',
            'user_id' => 'victor garcia'
        ] );

        Cursos::factory( 9 )->create();
    }
}