<?php

namespace App\traits;

use Illuminate\Support\Carbon;

trait DateManager
{
    private function getDay($date){
        $dia=array('domingo','lunes','martes','miercoles','jueves','viernes','sabado');
        return $dia[$date];
    }

    private function getMonth($date){
        $mes=array('','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        return $mes[$date];
    }

    public function dateStr($date){
        return $this->getDay($date->dayOfWeek).' '.$date->day.' de '.$this->getMonth($date->month).' '.$date->year;
    }

}
