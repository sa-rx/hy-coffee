<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\About;


use App\Models\Offer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
     //   $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id','ASC')->get();
        $offers = Offer::whereAvailable('1')->orderBy('id','DESC')->get();
        $menus = Menu::orderBy('id','ASC')->get();
        $about = About::find(1);
        return view('home',compact('categories','offers','about','menus'));
    }
} 
