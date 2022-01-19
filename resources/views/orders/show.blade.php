@extends('layouts.app')

@section('content')


  <!-- ======= Chefs Section ======= -->
  <section id="chefs" class="chefs container section-bg">
        <div  id="example" class="container " data-aos="fade-up">

            <div class="section-title">
                <h2>رقم الطلب #{{$order->id}} </h2>
            </div>
            <br>
            <h5>{!! nl2br( $order->cart )!!}</h5>
            <hr>
          
            @if( $order->status == 1)
            <h4>دفع</h4>
            @else
            <h4 class="text-danger ">لم يدفع</h4>
            @endif
            <h5> عدد الاصناف : {{$order->total_qty}} </h5>
            <h5>الاجمالي : {{$order->total_price}} ريال</h5>
           
            
           

        </div>
    </section><!-- End Chefs Section -->

@endsection