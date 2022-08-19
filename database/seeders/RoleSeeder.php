<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Alumno']);


        Permission::create(['name' => 'admin.home'])->syncRoles([$role1]);

        Permission::create(['name' => 'courses'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$role1,$role2]);   
        Permission::create(['name' => 'admin.roles.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.roles.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.roles.destroy'])->syncRoles([$role1,$role2]);

    }
}