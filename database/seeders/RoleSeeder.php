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

        $adminpermissions = ['1','2','3','4','5','6','7','8','15'];
        $admin->givePermissionTo($adminpermissions);

        $planner = Role::create(['name' =>'planner']);
        $plannerPermissions = ['22','23','24','25','26','27','28','29','30','31','32','33','34','35',
        '36','37','38','39','40','41','42','43','44','45','46','47','48','49'];
        $planner->givePermissionTo($plannerPermissions);
    }
}
