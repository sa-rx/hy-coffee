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
                                {{$menu['price']}} sar
                                <a href="#" class="btn btn-danger btn-sm ml-4">delete</a>

                                
                                <input type="text" name="qty" id="qty" value={{$menu['qty']}}>
                                <a href="#" class="btn btn-dark btn-sm ml-4">change</a>

                            </div>
                        </div>
                    </div>
                @endforeach
                <p><strong>Total : ${{$cart->totalPrice}}</strong></p>

            </div>

            <div class="col-4">
                <div class="card section-bg text-white">
                    <div class="card-body">
                        <h3 class="card-titel">
                            Your Cart
                            <hr>    
                        </h3>
                        <div class="card-text">
                            <p>
                            Total Amount is ${{$cart->totalPrice}}
                            </p>
                            <p>
                            Total Quantities is {{$cart->totalQty}}
                            </p>
                            <a href="#" class="btn btn-info">Chekout</a>
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
