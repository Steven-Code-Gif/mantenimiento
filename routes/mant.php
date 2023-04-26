<?php

use App\Http\Controllers\Mant\FailController;
use App\Http\Controllers\Mant\GoalController;
use App\Http\Controllers\Mant\PlanController;
use App\Http\Controllers\Mant\TeamController;

use Illuminate\Support\Facades\Route;
 
Route::resource('/teams',TeamController::class)->names('teams');
Route::get('/teams/add/{id}',[TeamController::class,'add'])->name('teams.members-add');
Route::resource('/fails',FailController::class)->names('fails');
Route::get('/fails/add/{id}',[FailController::class,'add'])->name('fails.teams-add');
Route::get('/fail/tasks',[FailController::class,'tasks'])->name('fails.tasks');
Route::get('/fail/repair/{fail}',[FailController::class,'repair'])->name('fails.repair');
Route::post('/fail/despeje/{fail}',[FailController::class,'despeje'])->name('fails.despeje');
Route::get('/fail/repareid',[FailController::class,'repareid'])->name('fails.repareid');
Route::resource('/plans',PlanController::class)->names('plans');
Route::get('/plans/protocols/{plan}',[PlanController::class,'protocols'])->name('plans.protocols');
Route::get('/plans/resources/{plan}',[PlanController::class,'resources'])->name('plans.resources');
Route::get('/goals/replacements/{goal}',[GoalController::class,'replacements'])->name('goals.replacements');

