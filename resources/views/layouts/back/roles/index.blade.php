@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        @can('role-create')
            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">   اضافة</a>
            @endcan
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered mt-4 table-striped" >
    <tr>
        <th>#</th>
        <th>اسم الصلاحية</th>
        <th width="280px">العمليات</th>
    </tr>

    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">عرض</a>
            @can('role-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
            @endcan
            @can('role-delete')
                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display: inline-block !important;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" style="margin:10px;">حذف</button>
                </form>
            @endcan
        </td>

    </tr>
    @endforeach
</table>
{!! $roles->render() !!}
@endsection
