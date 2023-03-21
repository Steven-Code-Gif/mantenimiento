<?php

namespace Database\Seeders;

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

         $user->assignRole('admin');

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
    }
}
