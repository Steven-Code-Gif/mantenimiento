<?php

namespace App\Http\Controllers\Rrhh;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    public function __construct(){
        $this->middleware('can:employes.index')->only('index');
        $this->middleware('can:employes.create')->only(['create','store']);
        $this->middleware('can:employes.show')->only('show');
        $this->middleware('can:employes.edit')->only(['edit','update']);
        $this->middleware('can:employes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = User::all();
        return view('rrhh.employes.index',compact('employes'));
    }
}
