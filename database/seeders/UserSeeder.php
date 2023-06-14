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
        $user = User::create([
            'name' =>'steven',
            'email' =>'steven@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->syncRoles(['admin']);

         $user = User::create([
            'name' =>'Planificador',
            'email' =>'planificador@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('planner');

         $user = User::create([
            'name' =>'Almacenista',
            'email' =>'almacenista@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('storer');

         $user = User::create([
            'name' =>'Recursos Humanos',
            'email' =>'rrhh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('rrhh');

         $user = User::create([
            'name' =>'Supervisor',
            'email' =>'supervisor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('supervisor');

         $user = User::create([
            'name' =>'Tecnico',
            'email' =>'tecnico@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('tecnico');

         $team = Team::create([
            'name' => 'equipo de tareas steven',
            'specialty_id' => Specialty::all()->random()->id,
            'user_id' => $user->id,
            'personal_team' => true,

         ]);

         $user = User::create([
            'name' =>'Jefe',
            'email' =>'jefe@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('jefe-de-mantenimiento');

         $user = User::create([
            'name' =>'ceo',
            'email' =>'ceo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
         ]);

         $user->assignRole('ceo');

         User::factory(4)->create()->each(function($user) use($team){
            $user->profile->salary = rand(3000,50000);
            $user->profile->save();
            $team->users()->attach($user->id);
         });

         User::factory(30)->create()->each(function($user){
            $user->profile->salary = rand(3000,50000);
            $user->profile->save();
         });
   }
}
