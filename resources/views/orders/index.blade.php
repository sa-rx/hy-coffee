@extends('layouts.app')

@section('title', ' الطلبات')


@section('content')







<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg border border-dark rounded">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>طلبات اليوم</h2>
        </div>
        <br>
        <div class="row ">
           
            <p class="col-4">اجمالي الطلبات المدفوعه: {{$order_status_total_price}}</p>
            <p class="col-4"> عدد الطلبات المدفوعه: {{$order_status_total_order}}</p>
            <p class="col-4">عدد الاصناف المدفوعه: {{$order_status_total_qty}}</p>
        </div>  
        <div class="row menu-container  rounded" data-aos="fade-up" data-aos-delay="200">
            <div   class="col-lg-12 menu-item " >
            <div class="col-xl-12 mx-auto container  section-bg table-responsive">
                    <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded  table-hover  text-light ">
                        <thead  class="">
                            <tr>
                                <th scope="col">رقم الطلب</th>
                                <th scope="col">الطلبات</th>
                                <th scope="col"> عدد الاصناف</th>
                                <th scope="col">الاجمالي</th>
                                <th scope="col">التاريخ </th>
                                <th scope="col">حاله الطلب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orderDates as $orderDate)
                                <tr>
                                    <td>{{$orderDate->id}}</td>
                                    <td >
                                        <a target="_blank" class="text-light" href="{{route('orders.show',$orderDate)}}">  {!! nl2br( $orderDate->cart )!!}</a>
                                    </td>
                                    <td>{{$orderDate->total_qty}}</td>
                                    <td>${{$orderDate->total_price}}</td>
                                    <td>{{$orderDate->created_at}}</td>

                                    @if($orderDate->status ==1)
                                    <td>مدفوع</td>
                                    @else
                                    <td class="text-danger">غير مدفوع</td>
                                    @endif

                                    
                                </tr>       
                            @empty
                            <p>لا توجد طلبات</p>
                            @endforelse 
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Menu Section -->
            




<br>





<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg border border-dark rounded">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>كل الطلبات </h2>
        </div>
        <div class="row menu-container  rounded" data-aos="fade-up" data-aos-delay="200">
            <div   class="col-lg-12 menu-item " >
                <div class="col-xl-12 mx-auto container  section-bg table-responsive">
                    <table style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg rounded  table-hover  text-light ">
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
                                        <a target="_blank" class="text-light" href="{{route('orders.show',$order)}}">  {!! nl2br( $order->cart )!!}</a>
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
                                    @can('حذف طلب')
                                    <td>
                                        <form method="post" action="{{route('orders.destroy',$order)}}">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>       
                            @empty
                            <p>لا توجد طلبات</p>
                            @endforelse 
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <div class="section-title">
                <h2>ارشيف الطلبات</h2>
        </div>
        <ul>
            <div class="row">
                @foreach($orders_archives as $key => $val)
                <li  class="col-lg-3"><a href="{{ route('orders.archive', $key.'-'.$val) }}">{{ date("F", mktime(0, 0, 0, $key, 1)) . ' ' . $val }}</a></li>
                @endforeach
            </div>
        </ul>
    </div>
   
</section><!-- End Menu Section -->
@endsection