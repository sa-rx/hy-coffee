@extends('layouts.app')

@section('title', 'الفئات ')

@section('content')

<div class="container  section-bg">
    @can('اضافة فئه')<a  class="btn btn-outline-light mx-auto mb-2" href="{{route('categories.create')}}"><i class="fas fa-plus-square"></i>  اضافة فئه </a> @endcan
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="cta-inner bg-faded text-center rounded table-responsive">
                <table  style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table section-bg table-striped  table-hover  text-light">

                    <thead  class="">
                        <tr>
                            <th scope="col">الاسم</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td><a class="text-light" href="{{route('categories.show',$category)}}">{{$category->name}}</a></td>
                                @can('تعديل فئه')
                                    <td> <a class="btn btn-outline-primary" href="{{route('categories.edit',$category)}}"><i class="fas fa-pen-square"></i>  </a> </td>
                                @endcan
                                <td>
                                @can('حذف فئه')
                                    <form method="post" action="{{route('categories.destroy',$category)}}"href="">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('هل انت متأكد؟')" class="btn btn-outline-danger" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endcan    
                                </td>
                            </tr>

                        @empty
                            <p>لا توجد فئات</p>
                        @endforelse
                    </tbody>
                    
                </table>  
            </div>
        </div>
    </div>
</div>

@endsection
