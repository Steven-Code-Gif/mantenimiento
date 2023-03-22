<?php

use App\Http\Controllers\RRHH\EmployesController;
use Illuminate\Support\Facades\Route;

Route::resource('/employes',EmployesController::class)->names('employes');
