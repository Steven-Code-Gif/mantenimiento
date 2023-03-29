<?php

namespace App\Http\Controllers\Mant;

use App\Http\Controllers\Controller;
use App\Models\Fail;
use App\Models\Team;
use Illuminate\Http\Request;

class FailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fails = Fail::orderBy('reported_at','desc')->get();
        return view('mant.fails.index',compact('fails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function show(Fail $fail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function edit(Fail $fail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fail $fail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fail  $fail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fail $fail)
    {
        //
    }

    public function add($id)
    {
        $fail = Fail::find($id);
        if($fail->status==1){
        return redirect()->route('fails.index')->with('success',
        'Falla reparada, no se le puede asignar grupo de tarea');
        }
        return view('mant.fails.add',compact('fail'));
    }

    public function tasks()
    {
        $team=auth()->user()->team;
        $fails=$team->fails()->where('status',0)->get();
        return view('mant.fails.tasks',compact('fails'));
    }

    public function repair(Fail $fail)
    {
        return view('mant.fails.repair',compact('fail'));
    }



}
