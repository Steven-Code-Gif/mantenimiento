<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Prototype extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function fullName(){
        return $this->name.' '.$this->cha_1.' '.$this->cha_2.' '.$this->cha_3.' '.$this->cha_4;
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function protocols(){
        return $this->hasMany(Protocol::class);
    }
    public function features(){
        return $this->belongsToMany(Feature::class);
    }
    public function equipments(){
        return $this->belongsToMany(Equipment::class)->withPivot('id');
    }
    
}
