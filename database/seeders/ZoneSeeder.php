<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create(['name'=>'Banzer','slug'=>'Banzer']);
        Zone::create(['name'=>'Centro de Producción','slug'=>'Centro de Producción']);
        Zone::create(['name'=>'Almacen','slug'=>'Almacén']);
        Zone::create(['name'=>'Oficina Central','slug'=>'Oficina Central']);
    }
}
