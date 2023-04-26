<?php

namespace App\Http\Controllers\Mant;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Goal;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        $equipment = Equipment::find(1);
        return view('mant.plans.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plan = new Plan();
        $plan->weekly_shift=44;
        $plan->daily_shift=8;
        $btn = "crear plan";
        $title = "crear un nuevo plan de mantenimiento ";
        return view('mant.plans.create',compact('plan','title','btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start' => 'required',
            'start_time' => 'required',
            'work_shift' => 'required',
            'weekly_shift' => 'required',
            'daily_shift' => 'required',
            'rest_time' => 'required',
            'rest_hours' => 'required',
        ]);

        if ($request->work_holiday=='on') {
            $request->request->add(['work_holiday'=>1]);
        }else{
            $request->request->add(['work_holiday'=>0]);
        }

        if ($request->work_overtime=='on') {
            $request->request->add(['work_overtime'=>1]);
        }else{
            $request->request->add(['work_overtime'=>0]);
        }
        Plan::create($request->all());
        return redirect()->route('plans.index')->with('success','Plan de mantenimiento creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return view('mant.plans.show',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $btn = "editar plan";
        $title = "crear un nuevo plan de mantenimiento ";
        return view('mant.plans.edit',compact('plan','title','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required',
            'start' => 'required',
            'start_time' => 'required',
            'work_shift' => 'required',
            'weekly_shift' => 'required',
            'daily_shift' => 'required',
            'rest_time' => 'required',
            'rest_hours' => 'required',
        ]);

        if ($request->work_holiday=='on') {
            $request->request->add(['work_holiday'=>1]);
        }else{
            $request->request->add(['work_holiday'=>0]);
        }

        if ($request->work_overtime=='on') {
            $request->request->add(['work_overtime'=>1]);
        }else{
            $request->request->add(['work_overtime'=>0]);
        }
        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success','Plan de mantenimiento actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('success','Plan de mantenimiento eliminado correctamente');
    }

    public function protocols(Plan $plan)
    {
        $equipments = $plan->equipments;
        $this->getProtocols($equipments,$plan);
        return redirect()->route('plans.index')->with('success','Protocolos asignados a plan de mantenimiento');
    }

    public function getProtocols($equipments,$plan){
        foreach ($equipments as $e) {
            $protocols = $e->prototype->protocols;
            foreach ($protocols as $p) {
                $goal = Goal::updateOrCreate(
                    ['plan_id'=>$plan->id,
                    'protocol_id'=>$p->id,
                    'equipment_id'=>$e->id,],
                    [
                    'specialty_id'=>$p->specialty_id,
                    'position'=>$p->position,
                    'task'=>$p->task,
                    'detail'=>$p->detail,
                    'frecuency'=>$p->frecuency,
                    'duration'=>$p->duration,
                    'permissions'=>$p->permissions,
                    'security'=>$p->security,
                    'workers'=>$p->workers,
                    'conditions'=>$p->conditions,
                    'total_replacement'=>0,
                    'total_supply'=>0,
                    'total_services'=>0,
                    'total_workers'=>0,
                    'workers_id'=>'',
                    'total'=>0,
                    'start'=>$plan->start,
                    'end'=>now(),
                    'done'=>now(),
                    'days'=>0,
                    'time'=>0]
                );
            }
        }
    }
    public function resources(Plan $plan)
    {
        $goals = $plan ->goals;
        return view('mant.plans.resources',compact('goals'));
    }
}
