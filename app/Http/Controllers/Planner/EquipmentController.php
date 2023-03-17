<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Prototype;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments= Equipment::all();
        return view ('planner.equipments.index',compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = new Equipment();
        $equipment->name ='equipo-'. Carbon::now()->format('ydmhmsss');
        $title="Agregar Equipo";
        $btn="create";
        $zones = Zone::orderBy('name')->get();
        $prototypes = Prototype::orderBy('name')->get();
        return view('planner.equipments.create',compact('equipment','title','btn','zones','prototypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'prototype_id'=>'integer|required',
            'location'=>'required',
            'service'=>'integer|required',
            'description'=>'string',
        ]);
        Equipment::create($data+['slug'=>Str::slug($data['name'])]);
        return redirect()->route('equipments.index')
        ->with('success','Equipo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        
        $title="Editar Equipo";
        $btn="update";
        $zones = Zone::orderBy('name')->get();
        $prototypes = Prototype::orderBy('name')->get();
        return view('planner.equipments.edit',compact('equipment','title','btn','zones','prototypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name'=>'required',
            'prototype_id'=>'integer|required',
            'location'=>'required',
            'service'=>'integer|required',
            'description'=>'string',
        ]);
        $equipment->update($data+['slug'=>Str::slug($data['name'])]);
        return redirect()->route('equipments.index')
        ->with('success','Equipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipments.index')
        ->with('fail','Equipo eliminado correctamente');
    }
}
