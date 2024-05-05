@extends('layouts.master')
@section('content')


<div class="container">
    <div class="row">

        <div class="col-3">
            <div class="card">
              <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                </div>
                <div class="h1 m-0">{{$Post}}</div>
                <div class="text-muted mb-4"> عدد المقالات</div>
              </div>
            </div>
          </div>




          <div class="col-3">

            <div class="card">
              <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                </div>
                <div class="h1 m-0">{{$Tag}}</div>
                <div class="text-muted mb-4"> عدد التاجات</div>
              </div>
            </div>
          </div>





          <div class="col-3">

            <div class="card">
              <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                </div>
                <div class="h1 m-0">{{$Category}}</div>
                <div class="text-muted mb-4"> عدد الفئات</div>
              </div>
            </div>
          </div>





          <div class="col-3">

            <div class="card">
              <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                </div>
                <div class="h1 m-0">{{$User}}</div>
                <div class="text-muted mb-4"> عدد المستخدمين</div>
              </div>
            </div>
          </div>
    </div>
</div>


@endsection
