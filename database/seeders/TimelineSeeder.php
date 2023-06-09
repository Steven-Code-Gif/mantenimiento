<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Team;
use App\Models\Timeline;
use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $json =File::get('database/data/timelines.json');
        // $objects=json_decode($json);
        // foreach ($objects as $object){
        //     $v=(array) $object;
        //     $timeline=new Timeline();
        //     $timeline->fill($v);
        //     $timeline->save();
        // }
        // $faker=app(Generator::class);
        // $timelines=Timeline::all();
        // $i=1;

        // foreach ($timeline as $t){
        //     $team = Team::all()->random();
        //     $users =$team->users()->take(rand(1,2))->pluck('users.id');
        //     $monto = Profile::whereIn('id',$users)->sum('salary');
        //     $str = implode(',',$users->toArray());
        //     $t->update([
        //         'goal_id'=>$i,
        //         'status'=> $faker->randomElement([1,1,1,1,0,1,0,1,0]),
        //         'done'=>$t->end,
        //         'time'=>$t->start->diffInHours($t->done),
        //         'days'=>$t->start->diffInHours($t->done),
        //         'workers_id'=>$str,
        //         'team_id'=>$team->id,
        //         'total_workers'=>$monto,
        //     ]);
        //     $t->save;
        //     $i=$i+1;
        // }

    }
}
