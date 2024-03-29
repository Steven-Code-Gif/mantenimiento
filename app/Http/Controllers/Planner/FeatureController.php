<?php

namespace App\Http\Controllers\Planner;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Prototype;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function __construct(){
        $this->middleware('can:features.index')->only('index');
        $this->middleware('can:features.create')->only(['create','store']);
        $this->middleware('can:features.show')->only('show');
        $this->middleware('can:features.edit')->only(['edit','update']);
        $this->middleware('can:features.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features= Feature::orderBy('measure','asc')->orderBy('unit','asc')->get();
        return view ('planner.features.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feature = new Feature();
        $title ="Agregar Caracteristica";
        $btn="create";
        return view('planner.features.create',compact('feature','title','btn'));
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
            'measure'=>'required',
            'unit'=>'required',
            'symbol'=>'required',
            'isNumeric'=>'integer|required',
        ]);
        $temp = $data;
        unset($temp['isNumeric']);
        $str = implode(' : ',$temp);
        $data = $data+['resume'=>mb_strtolower($str)];
        
        Feature::create($data+['slug'=>Str::slug($data['unit']),
        'description'=>mb_strtolower($request->input('description'))]);
        return redirect()->route('features.index')
        ->with('success','Caracteristica creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        
        $title ="Editar Caracteristica";
        $btn="update";
        return view('planner.features.edit',compact('feature','title','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'measure'=>'required',
            'unit'=>'required',
            'symbol'=>'required',
            'isNumeric'=>'integer|required',
        ]);
        $temp = $data;
        unset($temp['isNumeric']);
        $str = implode(' : ',$temp);
        $data = $data+['resume'=>mb_strtolower($str)];
        
        $feature->update($data+['slug'=>Str::slug($data['unit']),
        'description'=>mb_strtolower($request->input('description'))]);
        return redirect()->route('features.index')
        ->with('success','Caracteristica actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('features.index')
        ->with('fail','Caracteristica eliminada correctamente');
    }
    public function prototype(Prototype $prototype){
        return view ('planner.features.features-prototype',compact('prototype'));
    }
}
