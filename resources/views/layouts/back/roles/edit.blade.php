@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-3  ">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> الرجوع</a>

    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('roles.update', $role->id) }}">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="name" value="{{ $role->name }}" placeholder="الصلاحيات" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الصلاحيات:</strong>
                <br>
                @foreach($permission as $value)
                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }} class="form-check-input">
                        <label class="form-check-label" >
                <div class="pull-right">

                        {{ $value->name }}
                </div>

                    </label>
                    <hr style="border-top: 1px solid red;">

                @endforeach
            </div>
        </div>





        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">احفظ</button>
        </div>
    </div>
</form>
@endsection
