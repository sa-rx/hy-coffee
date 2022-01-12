@extends('layouts.app')

@section('title', 'الفئات')

@section('content')

    <div class="container">
      <div class="row">
        @if($cart)

            <div class="col-8">
                @foreach($cart->items as $menu)
                    <div class="card section-bg mb-2">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$menu['name']}}
                            </h5>
                            <div class="card-text">
                                {{$menu['price']}} ريال
                                <a href="#" class="btn btn-danger btn-sm ml-4">حذف</a>

                                
                                <input type="text" name="qty" id="qty" value={{$menu['qty']}}>
                                <a href="#" class="btn btn-dark btn-sm ml-4">تعديل</a>

                            </div>
                        </div>
                    </div>
                @endforeach
                <p><strong>الاجمالي : ${{$cart->totalPrice}}</strong></p>

            </div>

            <div class="col-4">
                <div class="card section-bg text-white">
                    <div class="card-body">
                        <h3 class="card-titel">
                            طلباتك
                            <hr>    
                        </h3>
                        <div class="card-text">
                            <p>
                            الاجمالي ${{$cart->totalPrice}}
                            </p>
                            <p>
                            عدد الاصناف {{$cart->totalQty}}
                            </p>
                            <a href="
                            https://wa.me//966559370994?text=الصنف : 
                            %20 
                            @foreach($cart->items as $menu)
                            {{$menu['name']}} %20 
                            {{$menu['price']}} ريال %20 
                            @endforeach
                            %20 
                            الاجمالي ${{$cart->totalPrice}}
                            %20 
                            عدد الاصناف {{$cart->totalQty}}
                            %20 
                            " class="btn btn-info">اتمام الطلب</a>
                        </div>
                    </div>
                </div>
          
            </div>
        @else 
            <p>hgf</p>   
        @endif    
      </div>
    </div>


@endsection
