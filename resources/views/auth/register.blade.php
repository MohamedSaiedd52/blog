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

                                <h4 class="text-center mb-4 text-white">   سجل دخول الان </h4>
                                @include('layouts.back.message')
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-2 text-white"><strong>اسم المستخدم</strong></label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2 text-white"><strong>البريد الالكتروني</strong></label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group position-relative">
                                        <label class="mb-2 text-white"><strong>كلمه المرور</strong></label>
                                        <input type="password" id="dz-password" class="form-control" name="password">
                                        <span class="show-pass eye">
                                            <i class="fa fa-eye-slash toggle-password" data-target="#dz-password"></i>
                                            <i class="fa fa-eye toggle-password" data-target="#dz-password"></i>
                                        </span>
                                    </div>

                                    <div class="form-group position-relative">
                                        <label class="mb-2 text-white"><strong>تأكيد كلمه المرور</strong></label>
                                        <input type="password" id="dz-password-confirm" class="form-control" name="password_confirmation">
                                        <span class="show-pass eye">
                                            <i class="fa fa-eye-slash toggle-password" data-target="#dz-password-confirm"></i>
                                            <i class="fa fa-eye toggle-password" data-target="#dz-password-confirm"></i>
                                        </span>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn bg-white text-primary btn-block">  تسجيل</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white"> هل لديك حساب ؟ <a class="text-white" href="{{route('login')}}"> سجل دخولك</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--  --}}

@endsection
@section('scripts')

    <script>
    $(document).ready(function(){
        $(".toggle-password").click(function() {
            var target = $($(this).data("target"));
            $(this).toggleClass("fa-eye-slash fa-eye");
            var type = target.attr("type") === "password" ? "text" : "password";
            target.attr("type", type);
        });
    });
</script>

@endsection
