<?php

namespace App\Http\Controllers\Ceo;

use App\Http\Controllers\Controller;
use App\Interfaces\DatosServiceInterface;
use Illuminate\Http\Request;

class CeoController extends Controller
{
    public function index(DatosServiceInterface $datosServiceInterface)
    {
       $timelines =  $datosServiceInterface->timelinesCostByTask();
       return view('ceo.index');
        
    }
}
