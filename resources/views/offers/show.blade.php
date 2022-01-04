@extends('layouts.app')

@section('title', 'العروض ')

@section('content')

<div class="container " data-aos="fade-up">
    <div class="alert section-bg" role="alert">
        <ul class="list-unstyled list-hours mb-5 text-left mx-auto"  >
            <li class="list-unstyled-item list-hours-item d-flex">
                {{$offer->title}}
            </li>

            <li class="list-unstyled-item list-hours-item d-flex">
                {{$offer->price}}
            </li>

            <li class="list-unstyled-item list-hours-item d-flex">
                {!! nl2br( $offer->content )!!}
            </li>


            @if($offer->available == 1)
                <li class="list-unstyled-item list-hours-item d-flex">
                    متوفر
                </li>
            @else
                <li class="list-unstyled-item list-hours-item d-flex">
                    غير متوفر
                </li>
            @endif
        </ul>
    </div>
</div>

@endsection
