@extends('layouts.app')

@section('title', 'الاصناف ')

@section('content')


  <!-- ======= Chefs Section ======= -->
  <section id="chefs" class="chefs container section-bg">
        <div class="container " data-aos="fade-up">

            <div class="section-title">
                <h2>{{$menu->name}} </h2>
              
                        <span> {{$menu->price}} ريال</span>
                  
            </div>
            <h5>{!! nl2br( $menu->content )!!}</h5>

            <div class="row">
                
                <div class="col-lg-4 col-md-6"></div>

                <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="200">
                        <div  style="background-image: url({{$menu->img_url}}); height: 200px;  background-size: cover;    background-position: center;  background-size: contain; background-repeat: no-repeat;  background-position: center;"> </div>
                            <div class="member-info">
                                <div class="member-info-content">
                                    @if($menu->available == 1)
                                        <h4>  متوفر</h4>
                                    @else
                                        <h4>غير متوفر</h4>
                                    @endif

                                   
                                        <span> {{$menu->price}} ريال</span>
                                    
                                </div>
                                <div class="social">
                                    <a href="">{{$menu->calories}} سعره</a>
                                    <a href="">|</a>
                                    <a href="">الفئه  {{$menu->category->name}}</i></a>
                                </div>
                            </div>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6"></div>

            

            </div>

        </div>
    </section><!-- End Chefs Section -->








@endsection
