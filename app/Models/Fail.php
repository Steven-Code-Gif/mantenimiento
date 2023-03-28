<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fail extends Model
{
    use HasFactory;

    protected $dates = [
        'reported_at',
        'repareid_at'
    ];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class);
    }



}
