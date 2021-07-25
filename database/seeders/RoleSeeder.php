<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin=Role::create(['name'=>'admin']);
        $role_blogger=Role::create(['name'=>'blogger']);

        Permission::create(['name'=>'ver', 'description' => 'Ver el dashboard'])->syncRoles([$role_admin,$role_blogger]);

        Permission::create(['name'=>'crear', 'description' => 'Ver crear de usuarios'])->syncRoles([$role_admin]);
         }
}
