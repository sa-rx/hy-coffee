@extends('layouts.app')

@section('title', 'تعديل فئه ')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg">
                <div class="card-body">
                    <form class="" action="{{route('categories.update',$category)}}" method="post">
                         @csrf
                         @method('PATCH')
                        <div class="form-group">
                            <label for="name">اسم الفئه</label>
                            <input type="text" name="name" class="form-control"  @isset($category) value="{{$category->name}}" @endisset>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-light"> <i class="fas fa-plus-square"></i> تعديل </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
