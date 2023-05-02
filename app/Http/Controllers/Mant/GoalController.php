<?php

namespace App\Http\Controllers\Mant;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Plan;
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
    public function edit(Goal $goal){
        $protocols = Goal::where('equipment_id',$goal->equipment_id)->get();
        return view('mant.goals.edit',compact('goal','protocols'));
    }

    public function update(Request $request,Goal $goal){
        $request->validate([
            'position' => 'required|numeric',
            'priority' => 'required|numeric',
        ]);
        $goal->position = $request->input('position');
        $goal->priority = $request->input('priority');
        $goal->restriction = $request->input('restriction');
        $goal->save();
        return redirect()->route('goals.positions',$goal->id)
        ->with('success','Protocolo actualizado correctamente');
    }
    public function teams(Plan $plan){

    }
}
