@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> الرجوع</a>
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
<form method="POST" action="{{ route('roles.store') }}" class="mt-4">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="name" placeholder="اسم الصلاحية" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card card-body">
                <strong>الصلاحيات:</strong>
                <br>
                @foreach($permission as $value)
                    <div class="form-check custom-checkbox mb-3">
                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input">
                        <label class="form-check-label" >
                            <div class="pull-right">
                                {{ $value->name }}
                            </div>
                        </label>
                        <hr style="border-top: 1px solid red;">
                    </div>
                @endforeach
            </div>
        </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">احفظ</button>
        </div>
    </div>
</form>
@endsection
