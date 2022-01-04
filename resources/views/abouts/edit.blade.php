@extends('layouts.app')

@section('title', 'عن المقهى ')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg" >
                <div class="card-body">
                    <form action="{{route('abouts.update',$about)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="snap">سناب</label>
                                <input type="text" name="snap" class="form-control"  @isset($about) value="{{$about->snap}}" @endisset>
                            </div>
                                        
                            <div class="form-group col-md-6">
                                <label for="inst">انستا</label>
                                <input type="text" name="inst" class="form-control"  @isset($about) value="{{$about->inst}}" @endisset>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="number">الجوال</label>
                                <input type="text" name="number" class="form-control"   @isset($about) value="{{$about->number}}" @endisset>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">الموقع </label>
                                <input type="text" name="location" class="form-control"  @isset($about) value="{{$about->location}}" @endisset>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">العنوان </label>
                                <input type="text" name="address" class="form-control" @isset($about) value="{{$about->address}}" @endisset>
                            </div>

                            <div class="form-group ">
                                <label for="content">المحتوى </label>
                                <textarea type="text" name="content" class="form-control" >{{$about->content}} </textarea>
                            </div>
                        
                            <div class="form-group ">
                                <label for="worktime">اوقات العمل</label>
                                <textarea name="worktime" class="form-control" >{{$about->worktime}}</textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-light">اضافة</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
