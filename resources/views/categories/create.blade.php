@extends('layouts.app')

@section('title', ' اضافة فئه')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg" >
                <div class="card-body">
                    <form class="" action="{{route('categories.store')}}" method="post">
                         @csrf
                        <div class="form-group">
                            <label for="name">اسم الصنف</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-light"> <i class="fas fa-plus-square"></i> اضافة </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
