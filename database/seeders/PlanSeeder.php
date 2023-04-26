<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::create(
            [   'id' => 1,
                'name' => 'UPDS',
                'start' => '2023-04-12T00:00:00.000000Z',
                'start_time' => '2023-04-26T17:47:00.000000Z',
                'work_shift' => 1,
                'weekly_shift' => 44,
                'daily_shift' => 8,
                'work_holiday' => 0,
                'work_overtime' => 1,
                'rest_time' => '2023-04-26T18:51:00.000000Z',
                'rest_hours' => 1,
                'description' => 'lorem ipsun door',]
        );
        $random = Rand(7,17);
        $equipment = Equipment::inRandomOrder()->limit($random)->get();
        $plan->equipments()->attach($equipment);
    }
}
