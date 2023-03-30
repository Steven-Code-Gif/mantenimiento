<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fails(){
        return $this->belongsToMany(Fail::class);
    }
}
