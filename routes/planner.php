<?php

use App\Http\Controllers\Planner\EquipmentController;
use App\Http\Controllers\Planner\FeatureController;
use App\Http\Controllers\Planner\ProtocolController;
use App\Http\Controllers\Planner\PrototypeController;
use App\Http\Controllers\Planner\SubsystemController;
use App\Http\Controllers\Planner\SystemController;
use App\Http\Controllers\Planner\ZoneController;
use App\Http\Controllers\PrototypeProtocolController;
use Illuminate\Support\Facades\Route;


Route::resource('/zones',ZoneController::class)->names('zones');
Route::resource('/systems',SystemController::class)->names('systems');
Route::resource('/subsystems',SubsystemController::class)->names('subsystems');
Route::resource('/prototypes',PrototypeController::class)->names('prototypes');
Route::resource('/protocols',ProtocolController::class)->names('protocols');
Route::resource('/equipments',EquipmentController::class)->names('equipments');
Route::resource('/features',FeatureController::class)->names('features');
Route::get('/features-prototype/{prototype}',[FeatureController::class,'prototype'])->name('features-prototype');
Route::get('/images-prototype/{prototype}',[PrototypeController::class,'image'])->name('images-prototype');

Route::resource('/prototypes.protocols',PrototypeProtocolController::class)->names('prototypes.protocols');
