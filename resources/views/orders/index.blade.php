@extends('layouts.app')

@section('title', ' الطلبات')


@section('content')







<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg border border-dark rounded">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>الطلبات</h2>
    </div>

    <div class="row" data-aos="fade-up" >
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="menu-flters">
          <li data-filter="*" class="filter-active">الكل</li>
          <li data-filter=".filter-orderDates">اليوم</li>
          <li data-filter=".filter-orderMonths">الشهر</li>
          <li data-filter=".filter-orderStatus">مدفوع</li>
        </ul>
      </div>
    </div>

    <div class="row menu-container  rounded" data-aos="fade-up" data-aos-delay="200">



        <div   class="col-lg-12 menu-item filter-active" >
            <div class="col-xl-12 mx-auto container  section-bg">
                <p>الكل</p>
                <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded table-responsive-xxl table-hover  text-light ">
                    <thead  class="">
                        <tr>
                            <th scope="col">رقم الطلب</th>
                            <th scope="col">الطلبات</th>
                            <th scope="col"> عدد الاصناف</th>
                            <th scope="col">الاجمالي</th>
                            <th scope="col">التاريخ </th>
                            <th scope="col">حاله الطلب</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td >
                                    <a class="text-light" href="{{route('orders.show',$order)}}">{{$order->cart}}</a>
                                </td>
                                <td>{{$order->total_qty}}</td>
                                <td>${{$order->total_price}}</td>
                                <td>{{$order->created_at}}</td>

                                <td>
                                    <form action="{{route('orders.update',$order)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                            <select class="form-select form-select-sm" aria-label="Default select example"  name="status" id="1"   @isset($order) value="{{$order->status}}" @endisset>
                                                <option value="0" {{old('status',$order->status)=="0"? 'selected':''}}  value="$order->status">لم يدفع</option>
                                                <option value="1" {{old('status',$order->status)=="1"? 'selected':''}}  value="$order->status">دفع</option>            
                                            </select>
                                        <button type="submit" class="btn btn-info btn-sm">تعديل </button>
                                    </form>
                                </td>

                                <td>
                                    <form method="post" action="{{route('orders.destroy',$order)}}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>       
                        @empty
                        <p>لا توجد حجوزات</p>
                        @endforelse 
                    
                    </tbody>
                </table>
            </div>
        </div>



        <div   class="col-lg-12 menu-item filter-orderStatus" >
            <p>المدفوع</p>
            <div class="col-xl-12 mx-auto container  section-bg">
              
                <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded table-responsive-xxl table-hover  text-light ">
                    <thead  class="">
                        <tr>
                            <th scope="col">رقم الطلب</th>
                            <th scope="col">الطلبات</th>
                            <th scope="col"> عدد الاصناف</th>
                            <th scope="col " >الاجمالي</th>
                            <th scope="col">التاريخ </th>
                            <th scope="col">حاله الطلب</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orderStatus as $orderStatu)
                            <tr>
                                <td>{{$orderStatu->id}}</td>
                                <td >
                                    <a class="text-light" href="{{route('orders.show',$order)}}">{{$orderStatu->cart}}</a>
                                </td>
                                <td>{{$orderStatu->total_qty}}</td>
                                <td>${{$orderStatu->total_price}}</td>
                                <td>{{$orderStatu->created_at}}</td>
                                
                                @if($orderStatu->status == 1)
                                <td>مدفوع </td>
                                @else
                                <td> غير مدفوع</td>
                                @endif

                                <td>
                                    <form method="post" action="{{route('orders.destroy',$order)}}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>       
                        @empty
                        <p>لا توجد حجوزات</p>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>




        <div   class="col-lg-12 menu-item filter-orderDates" >
                <p>اليوم</p>

            <div class="col-xl-12 mx-auto container  section-bg">
                <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded table-responsive-xxl table-hover  text-light ">
                    <thead  class="">
                        <tr>
                            <th scope="col">رقم الطلب</th>
                            <th scope="col">الطلبات</th>
                            <th scope="col"> عدد الاصناف</th>
                            <th scope="col " >الاجمالي</th>
                            <th scope="col " >التاريخ</th>
                            <th scope="col">حاله الطلب</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orderDates as $orderDate)
                            <tr>
                                <td>{{$orderDate->id}}</td>
                                <td >
                                    <a class="text-light" href="{{route('orders.show',$order)}}">{{$orderDate->cart}}</a>
                                </td>
                                <td>{{$orderDate->total_qty}}</td>
                                <td>${{$orderDate->total_price}}</td>
                                <td>{{$orderDate->created_at}}</td>
                                
                                <td>
                                    @if($orderDate->status == 1)
                                        <td>مدفوع </td>
                                        @else
                                        <td> غير مدفوع</td>
                                    @endif
                                </td>
                            
                                <td>
                                    <form method="post" action="{{route('orders.destroy',$order)}}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>       
                        @empty
                        <p>لا توجد حجوزات</p>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>





        <div   class="col-lg-12 menu-item filter-orderMonths" >
            <p>الشهر</p>
            <div class="col-xl-12 mx-auto container  section-bg">
                <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded table-responsive-xxl table-hover  text-light ">
                    <thead  class="">
                        <tr>
                            <th scope="col">رقم الطلب</th>
                            <th scope="col">الطلبات</th>
                            <th scope="col"> عدد الاصناف</th>
                            <th scope="col " >الاجمالي</th>
                            <th scope="col " >التاريخ</th>
                            <th scope="col">حاله الطلب</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orderMonths as $orderMonth)
                            <tr>
                                <td>{{$orderMonth->id}}</td>
                                <td >
                                    <a class="text-light" href="{{route('orders.show',$order)}}">{{$orderMonth->cart}}</a>
                                </td>
                                <td>{{$orderMonth->total_qty}}</td>
                                <td>${{$orderMonth->total_price}}</td>
                                <td>${{$orderMonth->created_at}}</td>
                                
                                <td>
                                    @if($orderMonth->status == 1)
                                        <td>مدفوع </td>
                                        @else
                                        <td> غير مدفوع</td>
                                    @endif
                                </td>
                            
                                <td>
                                    <form method="post" action="{{route('orders.destroy',$order)}}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>       
                        @empty
                        <p>لا توجد حجوزات</p>
                        @endforelse 
                    </tbody>
                </table>
            </div>
                            

        </div>
    
    </div>
</div>
</section><!-- End Menu Section -->
            












@endsection