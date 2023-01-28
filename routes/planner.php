<?php

use App\Http\Controllers\Planner\ZoneController;
use Illuminate\Support\Facades\Route;


Route::resource('/zones',ZoneControllerontroller::class)->names('zones');
