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
        System::create(['name'=>'electri','slug'=>'electri']);
        System::create(['name'=>'transpo','slug'=>'transpo']);
        System::create(['name'=>'areas verd','slug'=>'areas verd']);
        System::create(['name'=>'descar','slug'=>'descar']);
        System::create(['name'=>'produc','slug'=>'produc']);
        System::create(['name'=>'monta','slug'=>'monta']);
    }
}
