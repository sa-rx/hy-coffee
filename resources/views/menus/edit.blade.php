@extends('layouts.app')

@section('title', '  تعديل اصناف')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card section-bg" >
                <div class="card-body">
                    <form class="" action="{{route('menu.update',$menu)}}" method="post" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name"> اسم الصنف</label>
                            <input type="text" name="name" class="form-control" @isset($menu) value="{{$menu->name}}" @endisset>
                        </div>

                        <div class="form-group">
                            <label for="img_url"> رابط الصوره</label>
                            <input type="text" name="img_url" class="form-control" @isset($menu) value="{{$menu->img_url}}" @endisset>
                        </div>

                      
                        <div class="form-group">
                            <label for="offer_price">سعر العرض </label>
                            <input type="text" name="offer_price" class="form-control"  @isset($menu) value="{{$menu->offer_price}}" @endisset>
                        </div>

                        <div class="form-group">
                            <label for="calories">السعرات </label>
                            <input type="text" name="calories" class="form-control"  @isset($menu) value="{{$menu->calories}}" @endisset>
                        </div>

                        <div class="form-group ">
                            <label for="available">متوفر؟</label>
                                <select class="form-select" aria-label="Default select example"  name="available" id="1" @isset($menu) value="{{$menu->available}}" @endisset>>
                                    <option value="1" {{old('available',$menu->available)=="1"? 'selected':''}}  value="$menu->available">متوفر</option>            
                                    <option value="0" {{old('available',$menu->available)=="0"? 'selected':''}}  value="$menu->available">غير متوفر</option>
                                </select>
                        </div>


                        <div class="form-group ">
                            <label  for="category_id" > الفئه</label>
                                <select class="form-control"  name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    <!--<option {{old('id',$menu->id)=="$menu->id"? 'selected':''}}  value="$menu->id">{{$menu->name}}</option>-->
                                    @endforeach
                                </select>
                        </div>


                        <div class="form-group">
                            <label for="content">المحتوى </label>
                            <textarea name="content" class="form-control">@isset($menu) {{$menu->content}} @endisset</textarea>
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
