@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')

<section id="testimonials" class="testimonials section-bg container">
    <div class="container" data-aos="fade-up">
        <div class="alert  container" role="alert">
            <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                
                <li class="list-unstyled-item list-hours-item d-flex">
                   <h3>{{$contact->name}}</h3> 
                </li>

                <li class="list-unstyled-item list-hours-item d-flex">
                   <h5>{{$contact->email}}</h5> 
                </li>

                <li class="list-unstyled-item list-hours-item d-flex">
                    الرساله : {{$contact->content}}
                </li>

            </ul>
         </div>
    </div>
</section>


@endsection
