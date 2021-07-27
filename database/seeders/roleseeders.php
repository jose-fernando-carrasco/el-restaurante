<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $role = Role::create(['name' => 'administrador']);
        $role1 = Role::create(['name' => 'cajero']);
        $role2 = Role::create(['name' => 'cliente']);
        $permission = Permission::create(['name' => 'edit articles']);
        $role->givePermissionTo($permission);
        $permission->assignRole($role);


    }
}
