<?php

use App\Http\Controllers\Rrhh\EmployesController;
use Illuminate\Support\Facades\Route;

Route::resource('/employes',EmployesController::class)->names('employes');
