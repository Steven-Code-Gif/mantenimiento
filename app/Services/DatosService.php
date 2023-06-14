<?php namespace App\Services;

use App\Interfaces\DatosServiceInterface;
use App\Models\Timeline;

class DatosService implements DatosServiceInterface
{
    public function prueba()
    {
        echo "  Funciona Correctamente";

    }
    public function timelinesCostByTask()
    {
        $timelines = Timeline::withSum('replacements','replacement_timeline.total')
                            ->withSum('supplies','supply_timeline.total')
                            ->withSum('services','service_timeline.total')->get();
            return $timelines;
    }
}