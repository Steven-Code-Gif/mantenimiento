<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    
    protected $fillable=['name','slug'];

    //relacion de uno a muchos entre sistemas y subsystemas
    public function subsystems(){
        return $this->hasMany(Subsystem::class);
    }
}
