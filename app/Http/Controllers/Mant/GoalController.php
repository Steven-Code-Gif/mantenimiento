<?php

namespace App\Http\Controllers\Mant;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function replacements(Goal $goal){
        return view('mant.goals.replacements',compact('goal'));
        
    }
}
