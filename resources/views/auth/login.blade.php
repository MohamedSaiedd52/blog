


@extends('layouts.guest')
@section('css')

<style>
    *{
        font-family: "Almarai", sans-serif;
  font-weight: 700;
  font-style: normal
    }
    .authincation-content {
    background: var(--primary);
    box-shadow: 0 0 35px 0 rgba(154, 161, 171, 0.15);
    border-radius: 5px;
    margin: 150px auto !important;
}
</style>
@endsection
@section('content')

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">



                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white"> قم بتسجيل دخولك الان   </h4>


@include('layouts.back.message')
                                    <form action="{{route('login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-2 text-white"><strong>البريد الالكتروني</strong></label>
                                            <input type="email" class="form-control"  name="email" required>
                                        </div>
                                        <div class="form-group position-relative">
                                            <label class="mb-2 text-white"><strong>كلمه المرور</strong></label>
											<input type="password" id="dz-password" class="form-control"  name="password" required>
											<span class="show-pass eye">

												<i class="fa fa-eye-slash"></i>
												<i class="fa fa-eye"></i>

											</span>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="form-check custom-checkbox ms-1 text-white">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1"> تذكرني </label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="{{route('password.request')}}"> هل نسيت كلمه المرور ؟ </a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">تسجيل الدخول</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">لا تمتلك حساب  لدينا ؟ <a class="text-white" href="{{route('register')}}"> سجل الان</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
