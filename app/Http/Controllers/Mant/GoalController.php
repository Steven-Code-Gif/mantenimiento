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

    public function positions(Goal $goal){
        $goals = Goal::where('equipment_id',$goal->equipment_id)->get();
        return view('mant.goals.positions',compact('goals'));
        
    }
}
