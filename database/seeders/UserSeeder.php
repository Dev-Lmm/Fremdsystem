<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        User::create( [
            'name' => 'victor garcia',
            'email' => 'victorgarcia@gmail.com',
            'password' => bcrypt( '12345678' ),
        ] )->assignRole( 'Admin' );

        User::factory( 9 )->create();
    }
}