@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif

<!-- Error message -->
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('error') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif






@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success mb-4" role="alert">
        تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل
    </div>
@endif
