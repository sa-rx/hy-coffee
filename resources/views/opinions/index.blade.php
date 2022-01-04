@extends('layouts.app')

@section('title', ' الاراء')

@section('content')



<section id="testimonials" class="testimonials container rounded section-bg"  data-aos="fade-up">
    <div class="container">
        @forelse($opinions as $opinion)
            <div class="alert rounded border border-dark  container" role="alert">
                <h3>{{$opinion->name}}</h3>
                <p>{{$opinion->content}}</p>  
                <hr>

                @can('حذف الرسايل  في صفحة  الاراء')
                    <form method="post" action="{{route('opinions.destroy',$opinion)}}"href="">
                        @method('delete')
                        @csrf
                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-danger" > <i class="fas fa-trash-alt"></i></button>
                    </form>
                @endcan
            </div>
        @empty
            <p>لا توجد اراء</p>
        @endforelse    
    </div>
</section>      

@endsection
