<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function prototype(){
        return $this->belongsTo(Prototype::class);
    }
    public function features(){
        return $this->belongsToMany(feature::class)->withPivot('id','value');
    }

    public function fails(){
        return $this->hasMany(Equipment::class);
    }
}
