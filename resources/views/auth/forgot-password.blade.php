@extends('layouts.guest')
@section('css')

<style>
    *{
        font-family: "Almarai", sans-serif;
  font-weight: 700;
  font-style: normal
    }
    .authincation-content {

    margin: 50px auto !important;
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

                                <h4 class="text-center mb-4 text-white">هل نسيت كلمة السر</h4>

                                <div class="mb-4 text-sm text-white">
                                    {{ __('نسيت كلمة السر؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسنرسل إليك عبر البريد الإلكتروني رابط إعادة تعيين كلمة المرور الذي سيسمح لك باختيار كلمة مرور جديدة.') }}
                                </div>
                                @if (session('status'))
    <div class="mb-4 alert alert-info">
        {{ session('status') }}
    </div>
@endif

                                <form method="POST" action="{{ route('password.email') }}">
        @csrf

                                    <div class="form-group">
                                        <label class="text-white"><strong>البريد الالكتروني</strong></label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">احفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection
