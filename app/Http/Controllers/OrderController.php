<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();

        $orders_archives = Order::orderBy('created_at','DESC')
            ->select(DB::raw("Year(created_at) as year"), DB::raw("Month(created_at) as month"))
            ->pluck('year','month')->toArray();
            //dd($orders_archives);
        return view('orders.index',compact('orders','orders_archives'));

        //$now = Carbon::now();
        //echo $now->year;
        //echo $now->month;
        //echo $now->weekOfYear;

        //$orderStatus = Order::whereStatus('1')->orderBy('id','DESC')->get();
       // $orderStatusTotal_price = Order::whereStatus('1')->sum('total_price');

        //$orderDates = Order::whereDate('created_at', Carbon::today())->get();

        //$orderMonths = Order::whereStatus('1')->whereMonth('created_at',$now->month)->get();

        //return view('orders.index',compact('orders','orderStatus','orderDates','orderMonths'));
        //return view('orders.index',compact('orders','orderStatus','orderDates','orderMonths','orderStatusTotal_price'));
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
        $order = new Order();
        $order->create($request->all());
        return redirect()->to('/')->with('message','تم ارسال طلبك');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
       // $order->update($request->all());
        //dd($order);
        $order->status = request('status');
        $order->save();
        return redirect()->to('orders')->with('message','تم تعديل الطلب');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->to('orders')->with('message','تمت الحذف بنجاح');
    }


    public function archiveOrders($date)
    {
        //$now = Carbon::now();
        //echo $now->year;
        //echo $now->month;
        //echo $now->weekOfYear;

        $exploded_date = explode('-', $date);
        $month = $exploded_date[0];
        $year = $exploded_date[1];
        
        $dates =  Order::whereStatus('1')
                          //->whereMonth('created_at',$now->month)
                          //->whereYear('created_at',$now->year)

                          ->whereMonth('created_at', $month)
                          ->whereYear('created_at', $year)                    
                          ->orderBy('id','DESC')->get(); 
                        
       
        return view('orders.archive',compact('dates'));
    }

}
