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


<div class="container mt-5 ">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-body ">
                    @props(['status'])

                    @if ($status)
                        <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
                            {{ $status }}
                        </div>
                    @endif
                 <div class="alert alert-danger" role="alert">

                    شكرا لتسجيلك! قبل البدء، هل يمكنك التحقق من عنوان بريدك الإلكتروني عن طريق النقر على الرابط الذي أرسلناه إليك للتو عبر البريد الإلكتروني؟ إذا لم تتلق رسالة البريد الإلكتروني، فسنرسل لك بكل سرور رسالة أخرى.
                </div>
                    <div class="mt-4 d-flex justify-content-between align-items-center ">
                        <form method="POST" action="{{ route('verification.send') }}" >
                            @csrf
                            <button type="submit" class="btn btn-primary">{{ __('إعادة ارسال بريد التحقق') }}</button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                {{ __('تسجيل خروج') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
