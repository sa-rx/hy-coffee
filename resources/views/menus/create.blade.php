@extends('layouts.app')

@section('title', '  اضافة اصناف')

@section('content')


<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg" >
                <div class="card-body">
                    <form class="" action="{{route('menu.store')}}" method="post">
                    @csrf

                        <div class="form-group">
                            <label for="name"> اسم الصنف</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="price">سعر الصنف</label>
                            <input type="text" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="offer_price">سعر العرض </label>
                            <input type="text" name="offer_price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="calories">السعرات </label>
                            <input type="text" name="calories" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="available">متوفر؟</label>
                                <select class="form-select" aria-label="Default select example"  name="available" id="1">
                                    <option value="1">متوفر</option>
                                    <option value="0">غير متوفر</option>
                                </select>
                        </div>


                        <div class="form-group ">
                            <label  for="category_id" > الفئه</label>
                                <select class="form-control"  name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                        </div>


                        <div class="form-group">
                            <label for="content">المحتوى </label>
                            <textarea name="content" class="form-control"></textarea>
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
