

<br><br>
  <!-- ======= Chefs Section ======= -->
  <section id="chefs" class="chefs container section-bg" dir="rtl">
        <div  id="example" class="container " data-aos="fade-up">

            <div class="section-title">
                <h2>رقم الطلب #{{$order->id}} </h2>
            </div>
            <br>
            <h4>{!! nl2br( $order->cart )!!}</h4>
            
          
            @if( $order->status == 1)
            <h4>دفع</h4>
            @else
            <h2 style="color: #b70019;">لم يدفع</h2>
            @endif
            <h3> عدد الاصناف : {{$order->total_qty}} </h3>
            <h3>الاجمالي : {{$order->total_price}} ريال</h3>
           
            
           

        </div>
        @if( $order->status == 1)
        <button onclick="window.print();" class="noPrint">طباعه</button>
       
        @else
        @endif
    </section><!-- End Chefs Section -->

