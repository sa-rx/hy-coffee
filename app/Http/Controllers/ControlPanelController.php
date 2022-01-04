<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlPanelController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:لوحة التحكم', ['only' => ['index']]);
       
    }

    
    public function index()
    {   
        return view('control.index');
    }
}
