<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\Team;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
        $admin = User::create([
            'name' =>'steven',
            'email' =>'steven@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $admin->syncRoles([]);
         $admin->syncRoles(['admin']);

         $planner = User::create([
            'name' =>'Planificador',
            'email' =>'planificador@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $planner->syncRoles([]);
         $planner->syncRoles('planner');

         $storer = User::create([
            'name' =>'Almacenista',
            'email' =>'almacenista@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $storer->syncRoles([]);
         $storer->syncRoles('storer');

         $rrhh = User::create([
            'name' =>'Recursos Humanos',
            'email' =>'rrhh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $rrhh->syncRoles([]);
         $rrhh->syncRoles('rrhh');

         $super = User::create([
            'name' =>'Supervisor',
            'email' =>'supervisor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $super->syncRoles([]);
         $super->syncRoles('supervisor');

         $tecnico = User::create([
            'name' =>'Tecnico',
            'email' =>'tecnico@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $tecnico->syncRoles([]);
         $tecnico->syncRoles('tecnico');

         $team = Team::create([
            'name' => 'equipo de tareas',
            'specialty_id' => Specialty::all()->random()->id,
            'user_id' => $tecnico->id,
            'personal_team' => true,

         ]);

         $jefe = User::create([
            'name' =>'Jefe',
            'email' =>'jefe@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $jefe->syncRoles([]);
         $jefe->syncRoles('jefe-de-mantenimiento');

         $ceo = User::create([
            'name' =>'ceo',
            'email' =>'ceo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);
         $ceo->syncRoles([]);
         $ceo->syncRoles('ceo');

         User::factory(4)->create()->each(function ($user) use ($team) {
            $user->syncRoles([]);
            $user->profile->salary = rand(3000, 5000);
            $user->profile->save();
            $team->users()->attach($user->id);
        });

        User::factory(30)->create()->each(function ($user) {
            $user->syncRoles([]);
            $user->profile->salary = rand(3000, 5000);
            $user->profile->save();
        });
   }

}

