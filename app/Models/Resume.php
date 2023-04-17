<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates=[
        'reported_at',
        'repareid_at',
        'assigned_at',
    ];
}
