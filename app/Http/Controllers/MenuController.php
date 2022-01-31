<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\About;


use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:الاصناف|اضافة صنف', ['only' => ['index']]);
        $this->middleware('permission:اضافة صنف|تعديل صنف', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل صنف', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف صنف', ['only' => ['destroy']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('category_id','DESC')->get();
        return view('menus.index',compact('menus'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('menus.create',compact('categories'));
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

            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required'
        ]);


        $menu = new Menu();
        $menu->create($request->all());
        $menu->user_id = Auth::id();
        return redirect()->to('menu')->with('message','تم اضافة الصنف بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show',compact('menu'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::get();
        return view('menus.edit',compact('categories','menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([

            'name'=>'required'
        ]);

        
        $menu->update($request->all());
             

        return redirect()->to('menu')->with('message','تم تعديل الصنف بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->to('menu')->with('message','تم حذف الصنف بنجاح');
    }




    public function addToCart(Menu $menu)
    {



       if(session()->has('cart')) {
           $cart = new Cart(session()->get('cart'));
       }else{
            $cart = new Cart();
       }

       $cart->add($menu);

       //dd($cart);

       session()->put('cart', $cart);
       return redirect()->back()->with('message','تم اضافة الصنف الى السله');
    }


    public function showCart()
    {
        $about = About::find(1);


        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart =  null;
        }


        return view('cart.show', compact('cart','about'));
    }

    public function removeToCart(Menu $menu)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($menu->id);

        if($cart->totalQty <= 0 ){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        }
       

        return redirect()->to('shopping-cart')->with('message','تم حذف الصنف بنجاح');
    }


    public function updateToCart(Request $request, Menu $menu)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($menu->id, $request->qty);
        session()->put('cart', $cart);
        return redirect()->to('shopping-cart')->with('success', 'Product updated');
    }




}
