<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory(8)->create()->each(function($team){
           $zones=Zone::all()->random()->pluck('id');
           $team->zones()->attach($zones);
           $users=User::all()->random(4)->pluck('id');
           $team->users()->attach($users);
         });
    }
}
