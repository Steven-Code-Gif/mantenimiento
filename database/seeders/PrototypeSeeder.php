<?php

namespace Database\Seeders;

use App\Models\Prototype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class PrototypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/prototipos.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $prototype = new Prototype();
            $prototype->name = mb_strtolower($obj->name);
            $prototype->cha_1 = mb_strtolower($obj->cha_1);
            $prototype->cha_2 = mb_strtolower($obj->cha_2);
            $prototype->cha_3 = mb_strtolower($obj->cha_3);
            $prototype->cha_4 = mb_strtolower($obj->cha_4);
            $prototype->save();
        }
    }
}
