<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $super_admin = Role::create(['name' =>'super-admin']);
        $admin = Role::create(['name' =>'admin']);

        $super_admin->givePermissionTo(Permission::all());

        $adminpermissions = ['1','2','3','4','5','6','7','8','15','22','23','24','25','26','27','28'];
        $admin->givePermissionTo($adminpermissions);

        $planner = Role::create(['name' =>'planner']);
        $plannerPermissions = ['22','23','24','25','26','27','28'];
        $planner->givePermissionTo($plannerPermissions);
    }
}
