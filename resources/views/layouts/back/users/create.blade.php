@extends('layouts.master')
@section('css')



<style>
    /* Define RTL styles */
    .rtl {
        direction: rtl;
        text-align: right;
    }

     /* Custom tooltip */
     .custom-tooltip {
                position: relative;
                display: inline-block;
            }

            .custom-tooltip .tooltiptext {
                visibility: hidden;
                width: auto;
                background-color: #333333;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 10px;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 10%;
                margin-left: -100px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .custom-tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 10%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #efe7e7 transparent transparent transparent;
            }

            .custom-tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }
    </style>

   @endsection
@section('title')
المستخدمين
@endsection

   @section('intitle')
   <li class="breadcrumb-item"><a href="{{route('Showuser')}}">المستخدمين</a></li>
   <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة مستخدم</a></li>
@endsection
@section('content')


    <div class="card">
        <div class="card-body">
            <h1></h1>

            <form action="{{route('Saveuser')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    {{-- <label for="Name" title="ع  " data-toggle="popover" data-trigger="hover" data-content="توضيح إضافي هنا" > --}}
            <label class="custom-tooltip">

                        اسم المستخدم
                        <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                        <span class="tooltiptext" style="display: inline-block; white-space: nowrap;">

                    اسم  المستخدم هذا تسجل به دخولك في الموقع
                </span>

                    </label>
                    <input type="text" name="name" id="Name" placeholder="Enter Name" class="form-control" required />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>















            <div class="mb-3">
                <label class="custom-tooltip">
البريد الالكتروني
                    <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                    <span class="tooltiptext" style="display: inline; white-space: wrap;">
                        تاكد من ان بريدك الالكتروني  يستقبل الرسائل لانه بعد التسجيل سنرسل لك رابط لتفعيل الايميل
                    </span>
                </label>
                <input type="email" name="email" id="email" placeholder="Enter email" class="form-control " required />
                @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>















         <div class="mb-3">

            <label class="custom-tooltip">
                كلمه المرور
                                    <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                                    <span class="tooltiptext" style="display: inline; white-space: wrap;">
يمكنك كتابه كلمه مرور قصيره حد ادني 6 حروف يمكنك استخدام # او  نصوص او ارقام
                                    </span>
                                </label>
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control " required />
                @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
         </div>













         <div class="mb-3">

            <label class="custom-tooltip">
رقم الهاتف
                <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                                    <span class="tooltiptext" style="display: inline; white-space: wrap;">
اكتب رقم الهاتف بكود الدوله ولا تكتب علامه +
                                    </span>
                                </label>
                <input type="number" name="Phone" id="Phone" placeholder="Enter Phone" class="form-control " required />
                @error('Phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
         </div>







        {{-- <div class="mb-3">
            <label class="custom-tooltip">
                تاريخ تأكيد البريد
                <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                <span class="tooltiptext" style="display: inline; white-space: wrap;">

                    اذا حددت التاريخ فانت تفعل البريد الالكتروني دون الحاجة الي عملية التحقق ولن نرسل  لك تفعيلًا.
                    لانك اصبحت تمتلك الصلاحية الان
                    اما اذا تركت الحقل فارغًا فسيكون البريد الالكتروني غير مفعل، وننصحك بذلك لتتمكن من استقبال رسائلنا.
                </span>
            </label>
            <input type="date" name="email_verified_at" id="email_verified_at" class="form-control rtl" />
            @error('email_verified_at')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}



         <div class="mb-3">

            <label class="custom-tooltip">
                  الصلاحيات
                <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                <span class="tooltiptext" style="display: inline; white-space: nowrap;">
بتحديدك نعم اذا انت ستمنح صلاحيه الادمن اما اذا قمت باختيارك لا ستمنح صلاحيه اليوزر
                </span>
            </label>
                <select name="is_admin" id="is_admin" class="form-control">
                    <option value="1">نعم</option>
                    <option value="0">لا</option>

                </select>
                @error('is_admin')
                <div class="text-danger">{{ $message }}</div>
            @enderror
         </div>



         <div class="mb-3">
            صوره الملف الشخصي
            <div class="custom-file" style="position: relative;">
                <input type="file" class="custom-file-input form-control form-control-sm" name="img_file" id="img_file" accept=".png, .jpeg, .jpg" aria-describedby="fileInputHelp">
                <div id="trashIcon" onclick="removeImage()" style="position: absolute; top: 0; left: 0; padding: 0.5rem;">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        </div>







                   <div class="text-center mt-6">
                    <button type="submit" class="btn btn-success rounded  btn-sm"  style="width: 200px !important;">حفظ</button>

                    <a href="{{route('Showuser')}}" class="btn btn-info btn-sm" style="width: 200px !important;">العودة</a>


                    </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')




<script>
    function removeImage() {
        // Clear the file input
        document.getElementById("img_file").value = '';
    }
</script>

@endsection












