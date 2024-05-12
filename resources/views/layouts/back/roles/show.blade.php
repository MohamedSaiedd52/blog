@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"> الرجوع</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تفاصيل الصلاحية</h5>
                <div class="form-group">
                    <strong>اسم الصلاحية:</strong>
                    {{ $role->name }}
                </div>
                <div class="form-group">
                    <strong>الصلاحيات:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            @php
                                $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
                                $color = $colors[array_rand($colors)];
                            @endphp
                            <span class="badge badge-{{ $color }}">{{ $v->name }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
