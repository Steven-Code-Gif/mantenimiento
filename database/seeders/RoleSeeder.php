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
        $super_admin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $super_admin->givePermissionTo(Permission::all());
        $adminpermissions = ['1', '2', '3', '4', '5', '6', '7', '8', '15'];
        $admin->givePermissionTo($adminpermissions);


        $planner = Role::create(['name' => 'planner']);
        $plannerPermissions = [
            '22', '23', '24', '25', '26', '27', '28',
            '29', '30', '31', '32', '33', '34', '35',
            '36', '37', '38', '39', '40', '41', '42',
            '43', '44', '45', '46', '47', '48', '49',
            '50', '51', '52', '53', '54', '55', '56',
            '57', '58', '59', '60', '61', '62', '63',
            '64', '65', '66', '67', '68', '69', '70',
            '71', '72', '73', '74', '75', '76', '77',
        ];
        $planner->givePermissionTo($plannerPermissions);


        $storer = Role::create(['name' => 'storer']);
        $storerPermissions = [
            '78', '79', '80', '81', '82', '83', '84',
            '85', '86', '87', '88', '89', '90', '91',
            '92', '93', '94', '95', '96', '97', '98',
            '99', '100','101','102','103','104','105'
        ];
        $storer->givePermissionTo($storerPermissions);


        $rrhh = Role::create(['name' => 'rrhh']);
        $rrhhPermissions = [
            '106', '107', '108', '109', '110', '111', '112',
        ];
        $rrhh->givePermissionTo($rrhhPermissions);


        $supervisor = Role::create(['name' => 'supervisor']);
        $supervisorPermissions = [
            '113', '114', '115', '116', '117', '118','119', 
            '120', '121', '122', '123', '124', '125','126','136'
        ];
        $supervisor->givePermissionTo($supervisorPermissions);


        $tecnico = Role::create(['name' => 'tecnico']);
        $tecnicoPermissions = [
            '127','128','137'
        ];
        $tecnico->givePermissionTo($tecnicoPermissions);


        $jefe = Role::create(['name' => 'jefe-de-mantenimiento']);
        $jefePermissions = [
            '129','130','131','132','133','134','135',
        ];
        $jefe->givePermissionTo($jefePermissions);
    }
}
