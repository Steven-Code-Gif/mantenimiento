<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //listado de permisos para roles
        Permission::create(['name'=>'roles.index','permission'=>'role list']);
        Permission::create(['name'=>'roles.create','permission'=>'role create']);
        Permission::create(['name'=>'roles.store','permission'=>'role create']);
        Permission::create(['name'=>'roles.edit','permission'=>'role edit']);
        Permission::create(['name'=>'roles.update','permission'=>'role edit']);
        Permission::create(['name'=>'roles.destroy','permission'=>'role delete']);
        Permission::create(['name'=>'roles.show','permission'=>'role view']);

        //listado de permisos para permissions
        Permission::create(['name'=>'permission.index','permission'=>'permission list']);
        Permission::create(['name'=>'permission.create','permission'=>'permission create']);
        Permission::create(['name'=>'permission.store','permission'=>'permission create']);
        Permission::create(['name'=>'permission.edit','permission'=>'permission edit']);
        Permission::create(['name'=>'permission.update','permission'=>'permission edit']);
        Permission::create(['name'=>'permission.destroy','permission'=>'permission delete']);
        Permission::create(['name'=>'permission.show','permission'=>'permission view']);

        //listado de permisos para users
        Permission::create(['name'=>'users.index','permission'=>'user list']);
        Permission::create(['name'=>'users.create','permission'=>'user create']);
        Permission::create(['name'=>'users.store','permission'=>'user create']);
        Permission::create(['name'=>'users.edit','permission'=>'user edit']);
        Permission::create(['name'=>'users.update','permission'=>'user edit']);
        Permission::create(['name'=>'users.destroy','permission'=>'user delete']);
        Permission::create(['name'=>'users.show','permission'=>'user view']);

         //listado de permisos para zones
         Permission::create(['name'=>'zones.index','permission'=>'zone list']);
         Permission::create(['name'=>'zones.create','permission'=>'zone create']);
         Permission::create(['name'=>'zones.store','permission'=>'zone create']);
         Permission::create(['name'=>'zones.edit','permission'=>'zone edit']);
         Permission::create(['name'=>'zones.update','permission'=>'zone edit']);
         Permission::create(['name'=>'zones.destroy','permission'=>'zone delete']);
         Permission::create(['name'=>'zones.show','permission'=>'zone view']);

    }
}
