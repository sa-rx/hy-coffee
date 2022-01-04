@extends('layouts.app')

@section('title', 'العروض ')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg" >
                <div class="card-body">
                    <form class="" action="{{route('offers.update',$offer)}}" method="post">
                    @csrf
                    @method('PATCH')
                
                        <div class="form-group">
                            <label for="title">اسم العرض</label>
                            <input type="text" name="title" class="form-control"  @isset($offer) value="{{$offer->title}}" @endisset>
                        </div>

                        <div class="form-group">
                            <label for="content">محتوى العرض</label>
                            <textarea name="content" class="form-control">@isset($offer) {{$offer->content}} @endisset</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">سعر العرض</label>
                            <input type="text" name="price" class="form-control" @isset($offer) value="{{$offer->price}}" @endisset>
                        </div>

                        <div class="form-group ">
                            <label for="available">متوفر؟</label>
                            <select class="form-control" name="available" id="1"  @isset($offer) value="{{$offer->available}}" @endisset>
                                <option value="1" {{old('available',$offer->available)=="1"? 'selected':''}}  value="$offer->available">متوفر</option>
                                <option value="0" {{old('available',$offer->available)=="0"? 'selected':''}}  value="$offer->available">متوفرغير</option>

                            </select>
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
