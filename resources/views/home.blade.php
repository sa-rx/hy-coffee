@extends('layouts.app')

@section('title', 'الرئيسيه')

@section('content')



<!-- ======= About Section ======= -->
<section id="about" class="about container section-bg border border-dark rounded">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
        <div class="about-img">
          <img src="assets/img/hy2.jpg" alt="">
        </div>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>{{ config('app.name') }}</h3>
        <p class="fst-italic" >
          {!! nl2br( $about->content )!!}
        </p>
      </div>
    </div>
  </div>
</section>
<!-- End About Section -->











<!-- ======= Events Section ======= -->
<section id="events" class="events ">
  <div class="container section-bg" data-aos="fade-up">
    <div  class="events-slider swiper  border border-dark rounded container" data-aos="fade-up" data-aos-delay="100">
      <br>
      <div class="section-title" >
        <h2>العروض</h2>
      </div>
      <div class="swiper-wrapper ">
        @forelse($offers as $offer)
          <div class="swiper-slide ">
            <div class="row event-item" >
              <div class=" content " style="margin: 11px 30px 0 0;">
                <h3>{{$offer->title}}</h3>
                <div class="price">
                  @if(isset($offer->price))
                    <p><span>{{$offer->price}} ريال</span></p>
                  @else
                  
                  @endif
                </div>
                <p class="fst-italic">
                  {!! nl2br( $offer->content )!!}
                </p>
                <a  target="_blank"  href="
                  https://wa.me//966{{$about->number}}?text=الطلبات :
                  %20 
                  {{$offer->title}}
                  
                  %20 
                  @if(isset($offer->price))
                    {{$offer->price}} ريال
                  @else
                  
                  @endif
                  
                  
                  %20 
                  {!! nl2br( $offer->content )!!}
                  %20 
                  
                  %20 
                  " class="btn btn btn-outline-light">اطلب العرض </a>
              </div>
            </div>
          </div><!-- End testimonial item -->
        @empty
         <div class="swiper-slide ">
            <div class="row event-item" >
              <div class=" content " style="margin: 11px 30px 0 0;">
                <h3>لا توجد عروض</h3>
              </div>
            </div>
          </div><!-- End testimonial item -->
        @endforelse    
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section><!-- End Events Section -->








    
<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg border border-dark rounded">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>المنيو</h2>
    </div>

    <div class="row" data-aos="fade-up" >
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="menu-flters">
          <li data-filter="*" class="filter-active">الكل</li>
          @forelse($categories as $category)
          <li data-filter=".filter-{{$category->id}}">{{$category->name}}</li>
          @empty
          <p>لا يوجد شيئ </p>
          @endforelse 
        </ul>
      </div>
    </div>

    <div class="row menu-container  rounded" data-aos="fade-up" data-aos-delay="200">

      @forelse($menus as $menu)


        <div   class="col-lg-6 menu-item filter-{{$menu->category_id}}" >
          <a href="{{route('menu.show',$menu)}}">
          <img src="{{$menu->img_url}}" class="menu-img" alt="">
          </a>
          <div class="menu-content">
            
              <a href="{{route('menu.show',$menu)}}">{{$menu->name}}</a><span>{{$menu->price}}ريال</span>
           
          </div>
          <div class="menu-ingredients">
          
            @if($menu->available == 0)
              <p>غير متوفر</p>         
            @else
            <a href="{{route('cart.add',$menu->id)}}" class="btn btn btn-outline-light"> اضف للطلباتي</a>
            @endif
          </div>
            <br>
            <br>
        </div>

      @empty
        <p>لا يوجد شيئ </p>
      @endforelse  
    </div>
  </div>
</section><!-- End Menu Section -->
  









@endsection
