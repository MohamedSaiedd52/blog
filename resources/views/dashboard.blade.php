@extends('layouts.master')
@section('title')

Dashboard
@endsection
@section('css')

@endsection
@section('content')


    <div class="row">


          <div class="col-xl-3 col-xxl-6 col-lg-4 col-sm-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body me-3">
                            <h2 class="text-success">{{$Post}}</h2>
                            <span class="position">                     عدد المقالات
                            </span>
                        </div>
                        <span class="cd-icon bgl-success">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M38.4998 10.4995H35.0002V38.4999H38.4998C40.4245 38.4999 42 36.9238 42 34.9992V13.9992C42 12.075 40.4245 10.4995 38.4998 10.4995Z" fill="#2BC155"></path>
                                <path d="M27.9998 10.4995V6.9998C27.9998 5.07515 26.4243 3.49963 24.5001 3.49963H17.4998C15.5757 3.49963 14.0001 5.07515 14.0001 6.9998V10.4995H10.5V38.4998H31.5V10.4995H27.9998ZM24.5001 10.4995H17.4998V6.99929H24.5001V10.4995Z" fill="#2BC155"></path>
                                <path d="M3.50017 10.4995C1.57551 10.4995 0 12.075 0 13.9997V34.9997C0 36.9243 1.57551 38.5004 3.50017 38.5004H6.99983V10.4995H3.50017Z" fill="#2BC155"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="line bg-success"></span>
            </div>
        </div>


          <div class="col-xl-3 col-xxl-6 col-lg-4 col-md-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body me-3">
                            <h2 class="text-warning">{{$Tag}}</h2>
                            <span class="position"> عدد التاجات</span>
                        </div>
                        <span class="cd-icon bgl-warning">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1812 22.0083C15.0651 21.9063 14.7969 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4869 0.0410156 21.0011 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9385 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.5541 24.0553 28.5233 24.3626C35.7277 26.641 40.9507 32.0853 41.8277 38.538C41.9484 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50675 41.9591 3.14821 41.9591C2.27873 41.9591 1.45183 41.5824 0.881272 40.9263C0.310711 40.2701 0.0524068 39.3989 0.172348 38.5437C1.05148 32.0851 6.27447 26.641 13.4778 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1812 22.0083Z" fill="#FF9B52"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="line bg-warning"></span>
            </div>
        </div>




          <div class="col-xl-3 col-xxl-6 col-lg-4 col-sm-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body me-3">
                            <h2 class="text-secondary">{{$Category}}</h2>
                            <span class="position"> عدد الفئات</span>
                        </div>
                        <span class="cd-icon bgl-secondary">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M33.25 8.75H31.5V5.25C31.5 4.78587 31.3156 4.34075 30.9874 4.01256C30.6593 3.68437 30.2141 3.5 29.75 3.5C29.2859 3.5 28.8407 3.68437 28.5126 4.01256C28.1844 4.34075 28 4.78587 28 5.25V8.75H14V5.25C14 4.78587 13.8156 4.34075 13.4874 4.01256C13.1592 3.68437 12.7141 3.5 12.25 3.5C11.7859 3.5 11.3408 3.68437 11.0126 4.01256C10.6844 4.34075 10.5 4.78587 10.5 5.25V8.75H8.75C7.35761 8.75 6.02226 9.30312 5.03769 10.2877C4.05312 11.2723 3.5 12.6076 3.5 14V15.75H38.5V14C38.5 12.6076 37.9469 11.2723 36.9623 10.2877C35.9777 9.30312 34.6424 8.75 33.25 8.75Z" fill="#3F9AE0"></path>
                                <path d="M3.5 33.25C3.5 34.6424 4.05312 35.9777 5.03769 36.9623C6.02226 37.9469 7.35761 38.5 8.75 38.5H33.25C34.6424 38.5 35.9777 37.9469 36.9623 36.9623C37.9469 35.9777 38.5 34.6424 38.5 33.25V19.25H3.5V33.25Z" fill="#3F9AE0"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="line bg-secondary"></span>
            </div>
        </div>

          <div class="col-xl-3 col-xxl-6 col-lg-4 col-md-6">
            <div class="card border-card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body me-3">
                            <h2 class="text-warning">{{$User}}</h2>
                            <span class="position"> عدد المستخدمين</span>
                        </div>
                        <span class="cd-icon bgl-warning">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1812 22.0083C15.0651 21.9063 14.7969 21.6695 14.7015 21.5799C12.3755 19.3941 10.8517 15.9712 10.8517 12.1138C10.8517 5.37813 15.4869 0.0410156 21.0011 0.0410156C26.5152 0.0410156 31.1503 5.37813 31.1503 12.1138C31.1503 15.9679 29.6292 19.3884 27.3094 21.5778C27.2118 21.6699 26.9385 21.9116 26.8238 22.0125L26.8139 22.1799C26.8789 23.1847 27.5541 24.0553 28.5233 24.3626C35.7277 26.641 40.9507 32.0853 41.8277 38.538C41.9484 39.3988 41.6902 40.2696 41.1198 40.9254C40.5495 41.5813 39.723 41.9579 38.8541 41.9579C32.4956 41.9591 9.50675 41.9591 3.14821 41.9591C2.27873 41.9591 1.45183 41.5824 0.881272 40.9263C0.310711 40.2701 0.0524068 39.3989 0.172348 38.5437C1.05148 32.0851 6.27447 26.641 13.4778 24.3628C14.4504 24.0544 15.1263 23.1802 15.1885 22.1722L15.1812 22.0083Z" fill="#FF9B52"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <span class="line bg-warning"></span>
            </div>
        </div>




    </div>

 


@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>

{{-- <script src="{{asset('assets/js/plugins-init/flot-init.js')}}"></script> --}}


@endsection
