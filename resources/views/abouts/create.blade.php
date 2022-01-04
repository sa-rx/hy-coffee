@extends('layouts.app')

@section('title', 'عن المقهى ')

@section('content')

<div class="container">
    <form  action="{{route('abouts.store')}}" method="post">
            <div class="row">

                @csrf
                <div class="form-group col-md-6">
                    <label for="snap">السناب</label>
                    <input type="text" name="snap" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="inst">الانستا</label>
                    <input type="text" name="inst" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="number">رقم الجوال</label>
                    <input type="text" name="number" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="location">الموقع </label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="address">العنوان </label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="content">المحتوى </label>
                    <textarea type="text" name="content" class="form-control"></textarea>
                </div>
              
                <div class="form-group ">
                    <label for="worktime">اوقات العمل</label>
                    <textarea name="worktime" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <button class="btn btn-outline-light">حجز</button>
                </div>

            </div>
    </form>
</div>

@endsection
