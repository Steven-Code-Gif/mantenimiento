<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Goal;
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
                'name' => 'Plan de mantenimiento',
                'start' => '2023-04-12T00:00:00.000000Z',
                'start_time' => '2023-04-26T17:47:00.000000Z',
                'work_shift' => 1,
                'weekly_shift' => 44,
                'daily_shift' => 8,
                'work_holiday' => 0,
                'work_overtime' => 1,
                'work_time' => '06:00:00',
                'rest_hours' => 1,
                'rest_time_hours' => 4,
                'description' => 'lorem ipsun door',]
        );
        // $random = Rand(7,17);
        // $equipments = Equipment::inRandomOrder()->limit($random)->get();
        // $plan->equipments()->attach($equipments);
        // foreach ($equipments as $e) {
        //     $protocols = $e->prototype->protocols;
        //     $position = 0;
        //     $restriction = 0;
        //     foreach ($protocols as $p) {
        //         $position = $position + 1;
        //         $restriction = $position - 1;
        //         if ($position>13) {
        //             $position = 1;
        //             $restriction = 0;
        //         }
        //         $duration = rand(1,5);
        //         $goal = Goal::updateOrCreate(
        //             ['plan_id'=>$plan->id,
        //             'protocol_id'=>$p->id,
        //             'equipment_id'=>$e->id,],
        //             [
        //             'specialty_id'=>$p->specialty_id,
        //             'position'=>$position,
        //             'restriction'=>$restriction,
        //             'task'=>$p->task,
        //             'detail'=>$p->detail,
        //             'frecuency'=>$p->frecuency,
        //             'duration'=>$duration,
        //             'permissions'=>$p->permissions,
        //             'security'=>$p->security,
        //             'workers'=>$p->workers,
        //             'conditions'=>$p->conditions,
        //             'total_replacement'=>rand(578,5000),
        //             'total_supply'=>rand(578,5000),
        //             'total_services'=>rand(578,5000),
        //             'total_workers'=>rand(578,5000),
        //             'workers_id'=>'',
        //             'total'=>rand(578,5000),
        //             'start'=>$plan->start,
        //             'end'=>now(),
        //             'done'=>now(),
        //             'days'=>0,
        //             'time'=>0]
        //         );
        //     }
        // }
    }
}
