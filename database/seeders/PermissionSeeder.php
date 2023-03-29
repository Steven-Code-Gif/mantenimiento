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
      //listado de permisos para roles 7
      Permission::create(['name' => 'roles.index', 'permission' => 'role list']);
      Permission::create(['name' => 'roles.create', 'permission' => 'role create']);
      Permission::create(['name' => 'roles.store', 'permission' => 'role create']);
      Permission::create(['name' => 'roles.edit', 'permission' => 'role edit']);
      Permission::create(['name' => 'roles.update', 'permission' => 'role edit']);
      Permission::create(['name' => 'roles.destroy', 'permission' => 'role delete']);
      Permission::create(['name' => 'roles.show', 'permission' => 'role view']);

      //listado de permisos para permissions 14
      Permission::create(['name' => 'permission.index', 'permission' => 'permission list']);
      Permission::create(['name' => 'permission.create', 'permission' => 'permission create']);
      Permission::create(['name' => 'permission.store', 'permission' => 'permission create']);
      Permission::create(['name' => 'permission.edit', 'permission' => 'permission edit']);
      Permission::create(['name' => 'permission.update', 'permission' => 'permission edit']);
      Permission::create(['name' => 'permission.destroy', 'permission' => 'permission delete']);
      Permission::create(['name' => 'permission.show', 'permission' => 'permission view']);

      //listado de permisos para users 21
      Permission::create(['name' => 'users.index', 'permission' => 'user list']);
      Permission::create(['name' => 'users.create', 'permission' => 'user create']);
      Permission::create(['name' => 'users.store', 'permission' => 'user create']);
      Permission::create(['name' => 'users.edit', 'permission' => 'user edit']);
      Permission::create(['name' => 'users.update', 'permission' => 'user edit']);
      Permission::create(['name' => 'users.destroy', 'permission' => 'user delete']);
      Permission::create(['name' => 'users.show', 'permission' => 'user view']);

      //listado de permisos para zonas 28
      Permission::create(['name' => 'zones.index', 'permission' => 'zone list']);
      Permission::create(['name' => 'zones.create', 'permission' => 'zone create']);
      Permission::create(['name' => 'zones.store', 'permission' => 'zone create']);
      Permission::create(['name' => 'zones.edit', 'permission' => 'zone edit']);
      Permission::create(['name' => 'zones.update', 'permission' => 'zone edit']);
      Permission::create(['name' => 'zones.destroy', 'permission' => 'zone delete']);
      Permission::create(['name' => 'zones.show', 'permission' => 'zone view']);

      //listado de permisos para systems 35
      Permission::create(['name' => 'systems.index', 'permission' => 'system list']);
      Permission::create(['name' => 'systems.create', 'permission' => 'system create']);
      Permission::create(['name' => 'systems.store', 'permission' => 'system create']);
      Permission::create(['name' => 'systems.edit', 'permission' => 'system edit']);
      Permission::create(['name' => 'systems.update', 'permission' => 'system edit']);
      Permission::create(['name' => 'systems.destroy', 'permission' => 'system delete']);
      Permission::create(['name' => 'systems.show', 'permission' => 'system view']);

      //listado de permisos para subsystems 42
      Permission::create(['name' => 'subsystems.index', 'permission' => 'subsystem list']);
      Permission::create(['name' => 'subsystems.create', 'permission' => 'subsystem create']);
      Permission::create(['name' => 'subsystems.store', 'permission' => 'subsystem create']);
      Permission::create(['name' => 'subsystems.edit', 'permission' => 'subsystem edit']);
      Permission::create(['name' => 'subsystems.update', 'permission' => 'subsystem edit']);
      Permission::create(['name' => 'subsystems.destroy', 'permission' => 'subsystem delete']);
      Permission::create(['name' => 'subsystems.show', 'permission' => 'subsystem view']);

      //listado de permisos para prototype 49
      Permission::create(['name' => 'prototypes.index', 'permission' => 'prototype list']);
      Permission::create(['name' => 'prototypes.create', 'permission' => 'prototype create']);
      Permission::create(['name' => 'prototypes.store', 'permission' => 'prototype create']);
      Permission::create(['name' => 'prototypes.edit', 'permission' => 'prototype edit']);
      Permission::create(['name' => 'prototypes.update', 'permission' => 'prototype edit']);
      Permission::create(['name' => 'prototypes.destroy', 'permission' => 'prototype delete']);
      Permission::create(['name' => 'prototypes.show', 'permission' => 'prototype view']);

      //    listado de permisos para protocol 56
      Permission::create(['name' => 'protocols.index', 'permission' => 'protocols list']);
      Permission::create(['name' => 'protocols.create', 'permission' => 'protocols create']);
      Permission::create(['name' => 'protocols.store', 'permission' => 'protocols create']);
      Permission::create(['name' => 'protocols.edit', 'permission' => 'protocols edit']);
      Permission::create(['name' => 'protocols.update', 'permission' => 'protocols edit']);
      Permission::create(['name' => 'protocols.destroy', 'permission' => 'protocols delete']);
      Permission::create(['name' => 'protocols.show', 'permission' => 'protocols view']);

      //    listado de permisos para prototype-protocol 63
      Permission::create(['name' => 'prototype.protocols.index', 'permission' => 'prototype-protocol list']);
      Permission::create(['name' => 'prototype.protocols.create', 'permission' => 'prototype-protocol create']);
      Permission::create(['name' => 'prototype.protocols.store', 'permission' => 'prototype-protocol create']);
      Permission::create(['name' => 'prototype.protocols.edit', 'permission' => 'prototype-protocol edit']);
      Permission::create(['name' => 'prototype.protocols.update', 'permission' => 'prototype-protocol edit']);
      Permission::create(['name' => 'prototype.protocols.destroy', 'permission' => 'prototype-protocol delete']);
      Permission::create(['name' => 'prototype.protocols.show', 'permission' => 'prototype-protocol view']);

      //    listado de permisos para equipments 70
      Permission::create(['name' => 'equipments.index', 'permission' => 'equipments list']);
      Permission::create(['name' => 'equipments.create', 'permission' => 'equipments create']);
      Permission::create(['name' => 'equipments.store', 'permission' => 'equipments create']);
      Permission::create(['name' => 'equipments.edit', 'permission' => 'equipments edit']);
      Permission::create(['name' => 'equipments.update', 'permission' => 'equipments edit']);
      Permission::create(['name' => 'equipments.destroy', 'permission' => 'equipments delete']);
      Permission::create(['name' => 'equipments.show', 'permission' => 'equipments view']);

      //    listado de permisos para features 77
      Permission::create(['name' => 'features.index', 'permission' => 'features list']);
      Permission::create(['name' => 'features.create', 'permission' => 'features create']);
      Permission::create(['name' => 'features.store', 'permission' => 'features create']);
      Permission::create(['name' => 'features.edit', 'permission' => 'features edit']);
      Permission::create(['name' => 'features.update', 'permission' => 'features edit']);
      Permission::create(['name' => 'features.destroy', 'permission' => 'features delete']);
      Permission::create(['name' => 'features.show', 'permission' => 'features view']);

      //    listado de permisos para services 84
      Permission::create(['name' => 'services.index', 'permission' => 'services list']);
      Permission::create(['name' => 'services.create', 'permission' => 'services create']);
      Permission::create(['name' => 'services.store', 'permission' => 'services create']);
      Permission::create(['name' => 'services.edit', 'permission' => 'services edit']);
      Permission::create(['name' => 'services.update', 'permission' => 'services edit']);
      Permission::create(['name' => 'services.destroy', 'permission' => 'services delete']);
      Permission::create(['name' => 'services.show', 'permission' => 'services view']);

      //    listado de permisos para tool 91
      Permission::create(['name' => 'tools.index', 'permission' => 'tools list']);
      Permission::create(['name' => 'tools.create', 'permission' => 'tools create']);
      Permission::create(['name' => 'tools.store', 'permission' => 'tools create']);
      Permission::create(['name' => 'tools.edit', 'permission' => 'tools edit']);
      Permission::create(['name' => 'tools.update', 'permission' => 'tools edit']);
      Permission::create(['name' => 'tools.destroy', 'permission' => 'tools delete']);
      Permission::create(['name' => 'tools.show', 'permission' => 'tools view']);

      //    listado de permisos para supplies 98
      Permission::create(['name' => 'supplies.index', 'permission' => 'supplies list']);
      Permission::create(['name' => 'supplies.create', 'permission' => 'supplies create']);
      Permission::create(['name' => 'supplies.store', 'permission' => 'supplies create']);
      Permission::create(['name' => 'supplies.edit', 'permission' => 'supplies edit']);
      Permission::create(['name' => 'supplies.update', 'permission' => 'supplies edit']);
      Permission::create(['name' => 'supplies.destroy', 'permission' => 'supplies delete']);
      Permission::create(['name' => 'supplies.show', 'permission' => 'supplies view']);

      //    listado de permisos para replacements 104
      Permission::create(['name' => 'replacements.index', 'permission' => 'replacements list']);
      Permission::create(['name' => 'replacements.create', 'permission' => 'replacements create']);
      Permission::create(['name' => 'replacements.store', 'permission' => 'replacements create']);
      Permission::create(['name' => 'replacements.edit', 'permission' => 'replacements edit']);
      Permission::create(['name' => 'replacements.update', 'permission' => 'replacements edit']);
      Permission::create(['name' => 'replacements.destroy', 'permission' => 'replacements delete']);
      Permission::create(['name' => 'replacements.show', 'permission' => 'replacements view']);

      //    listado de permisos para rrhh 111
      Permission::create(['name' => 'employes.index', 'permission' => 'employes list']);
      Permission::create(['name' => 'employes.create', 'permission' => 'employes create']);
      Permission::create(['name' => 'employes.store', 'permission' => 'employes create']);
      Permission::create(['name' => 'employes.edit', 'permission' => 'employes edit']);
      Permission::create(['name' => 'employes.update', 'permission' => 'employes edit']);
      Permission::create(['name' => 'employes.destroy', 'permission' => 'employes delete']);
      Permission::create(['name' => 'employes.show', 'permission' => 'employes view']);

      //    listado de permisos para teams 118
      Permission::create(['name' => 'teams.index', 'permission' => 'teams list']);
      Permission::create(['name' => 'teams.create', 'permission' => 'teams create']);
      Permission::create(['name' => 'teams.store', 'permission' => 'teams create']);
      Permission::create(['name' => 'teams.edit', 'permission' => 'teams edit']);
      Permission::create(['name' => 'teams.update', 'permission' => 'teams edit']);
      Permission::create(['name' => 'teams.destroy', 'permission' => 'teams delete']);
      Permission::create(['name' => 'teams.show', 'permission' => 'teams view']);

      //    listado de permisos para fails 125
      Permission::create(['name' => 'fails.index', 'permission' => 'fails list']);
      Permission::create(['name' => 'fails.create', 'permission' => 'fails create']);
      Permission::create(['name' => 'fails.store', 'permission' => 'fails create']);
      Permission::create(['name' => 'fails.edit', 'permission' => 'fails edit']);
      Permission::create(['name' => 'fails.update', 'permission' => 'fails edit']);
      Permission::create(['name' => 'fails.destroy', 'permission' => 'fails delete']);
      Permission::create(['name' => 'fails.show', 'permission' => 'fails view']);

      //    listado de permisos para fails 126
      Permission::create(['name' => 'fails.task', 'permission' => 'fails task']);
   }
}
