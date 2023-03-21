<?php

use App\Http\Controllers\Planner\ServiceController;
use App\Http\Controllers\Planner\SupplyController;
use App\Http\Controllers\Planner\ToolController;
use App\Http\Controllers\Planner\ReplacementController;
use Illuminate\Support\Facades\Route;


Route::resource('/services',ServiceController::class)->names('services');
Route::resource('/supplies',SupplyController::class)->names('supplies');
Route::resource('/tools',ToolController::class)->names('tools');
Route::resource('/replacements',ReplacementController::class)->names('replacements');


