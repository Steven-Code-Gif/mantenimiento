<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fail extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $dates = [
        'reported_at',
        'repareid_at',
        'assigned_at'
    ];

    // protected $attributes = [
    //     'reported_at' => '1962-01-17 00:00:00',
    //     'repareid_at' => '1962-01-17 00:00:00',
    //     'assigned_at' => '1962-01-17 00:00:00'
    // ];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class);
    }



}
