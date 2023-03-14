<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        System::create(['name'=>'Electrico','slug'=>'Electrico']);
        System::create(['name'=>'Cableado','slug'=>'Cableado']);
    }
}
