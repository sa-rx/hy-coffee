@extends('layouts.app')
@section('title', ' ادوار المستخدمين')

@section('content')
<div class="container section-bg border border-dark rounded table-responsive">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ادوار المستخدمين</h2>
            </div>
            <div class="pull-right">
                @can('اضافة صلاحيه')
                   <a class="btn btn-success" href="{{ route('roles.create') }}">انشاء صلاحيه</a>
                @endcan 
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table  style="--bs-table-hover-color: #d8a781 ;     border-color: #1e252c00;" class="table    table-hover  text-light">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th width="280px">Action</th>
        </tr>
            @foreach ($roles as $key => $role)
            <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>

            <td>
            @can('عرض صلاحيه')
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
            @endcan 

            @can('تعديل صلاحيه')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
            @endcan 

            @can('حذف صلاحيه')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endcan 

            </td>
        </tr>
         @endforeach
    </table>
</div>

{!! $roles->render() !!}
@endsection