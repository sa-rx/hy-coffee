@extends('layouts.app')

@section('title', 'الفئات')

@section('content')

    

    
<!-- ======= Menu Section ======= -->
<section id="menu" class="menu container section-bg"  data-aos="fade-up">
    <div class="container">
        <div class="container">
            <h1> {{$category->name}}</h1> 
    </div>
        <div class="row menu-container border border-secondary rounded" data-aos="fade-up" data-aos-delay="200">
            @forelse($category->menus as $menu)
                <div  class="col-lg-6 menu-item   filter-{{$menu->category->name}}">
                    <div class="menu-content">
                        <a href="{{route('menu.show',$menu)}}">{{$menu->name}}</a><span>${{$menu->price}}</span>
                    </div>

                    <div class="menu-ingredients">
                          {{$menu->content}}
                    </div>
                </div>
            @empty
                <p>لا يوجد شيئ </p>
            @endforelse  
        </div>
    </div>
</section><!-- End Menu Section -->


@endsection
