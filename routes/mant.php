<?php

use App\Http\Controllers\Mant\FailController;
use App\Http\Controllers\Mant\TeamController;
use Illuminate\Support\Facades\Route;
 
Route::resource('/teams',TeamController::class)->names('teams');
Route::get('/teams/add/{$id}',[TeamController::class,'add'])->name('teams.members-add');
Route::resource('/fails',FailController::class)->names('fails');
Route::get('/fails/add/{$id}',[FailController::class,'add'])->name('fails.teams-add');
Route::get('/fail/tasks',[FailController::class,'tasks'])->name('fails.tasks');
Route::get('/fail/repair/{fail}',[FailController::class,'repair'])->name('fails.repair');
