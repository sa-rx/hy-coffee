@extends('layouts.app')

@section('title', ' الطلبات')


@section('content')







<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg bdate bdate-dark rounded">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>الطلبات</h2>
        </div>
        <div class="row menu-container  rounded" data-aos="fade-up" data-aos-delay="200">
            <div   class="col-lg-12 menu-item " >
                <div class="col-xl-12 mx-auto container  section-bg table-responsive">


           
                
                    <table style="--bs-table-hover-color: #d8a781 ;     bdate-color: #1e252c00;" class="table section-bg rounded table-responsive-xxl table-hover  text-light ">
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
                            @forelse($dates as $date)
                                <tr>
                                    <td>{{$date->id}}</td>
                                    <td >
                                        <a target="_blank" class="text-light" href="{{route('orders.show',$date)}}">{{$date->cart}}</a>
                                    </td>
                                    <td>{{$date->total_qty}}</td>
                                    <td>${{$date->total_price}}</td>
                                    <td>{{$date->created_at}}</td>
                                    
                                    @if($date->status == 1)
                                    <td>مدفوع </td>
                                    @else
                                    <td> غير مدفوع</td>
                                    @endif

                                    <td>
                                        <form method="post" action="{{route('orders.destroy',$date)}}">
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
        </div>
    </div>
    
</section><!-- End Menu Section -->
            

@endsection


