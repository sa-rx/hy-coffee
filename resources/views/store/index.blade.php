@extends('layouts.app')

@section('title', 'المنتجات ')

@section('content')




<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>منتجاتنا</h2>
    </div>

    <div class="row">
      @forelse($products as $product)
        <div class="col-lg-4">
          <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <span>                <a  href="{{route('products.show',$product)}}">{{$product->name}} </a></span>
            <h4> {!! nl2br( $product->content )!!}</h4>

            @if(isset($product->offer_price))
            <p> {{$product->offer_price}} ريال</p>
            <p > <s>{{$product->price}}ريال </s></p>
            @else
            <p class="">{{$product->price}} ريال</p>
            @endif
          

            <a class="btn btn-outline-light" target="_blank" href=" https://wa.me//966{{$about->number}}?text=المنتج : {{$product->name}}
            %20 @if(isset($product->offer_price))
            سعر العرض : {{$product->offer_price}}
            @else
            السعر : {{$product->price}}%20
            @endif
            ">للطلب</a>
          </div>
        </div>
      @empty
        <p>لا توجد منتجات</p>
      @endforelse
    </div>
    
  </div>
</section><!-- End Why Us Section -->








@endsection
