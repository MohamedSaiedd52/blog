@extends('layouts.master')
@section('css')

<style>
    /* Define RTL styles */
    .rtl {
        direction: rtl;
        text-align: right;
    }

    </style>

    @endsection
@section('page-title')
 تعديل المتسخدم
@endsection
@section('content')


    <div class="card ">
        <div class="card-body">
            <h1></h1>
            <form action="{{ route('SaveEdituser',$users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- <input type="text" name="id" value="{{ $users->id }}"> --}}
                <div class="mb-3">
                <label for="Name">اسم المستخدم</label>
                <input type="text" name="name" id="Name" placeholder="Enter Name" class="form-control" value="{{ old('name', $users->name) }}" required />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="email">البريد الالكتروني</label>
                <input type="email" name="email" id="email" placeholder="Enter email" class="form-control" value="{{ old('email' , $users->email) }}" required />
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="password">كلمه المرور</label>
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control"  value="{{ old('password') }}" required />
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>


            <div class="mb-3">
                رقم الهاتف
                    <input type="number" name="Phone" id="Phone" placeholder="Enter Phone" class="form-control " required  value="{{ old('Phone', $users->Phone) }}" />
                    @error('Phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
             </div>





            {{-- <div class="mb-3">

                <label for="email_verified_at"> تاكيد البريد الالكتروني</label>
                <input type="date" name="email_verified_at" id="email_verified_at" class="form-control rtl"  value="{{ old('email_verified_at' , $users->email_verified_at) }}"  />
                @error('email_verified_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div> --}}

            <div class="mb-3">

                <label for="is_admin">الصلاحيات</label>
                <select name="is_admin" id="is_admin" class="form-control">
                    <option value="1" {{ old('is_admin' , $users->is_admin) == 1 ? 'selected' : '' }}>نعم</option>
                    <option value="0" {{ old('is_admin' , $users->is_admin) == 0 ? 'selected' : '' }}>لا</option>
                </select>
                @error('is_admin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img_file" class="form-label">صورة الملف الشخصي</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img_file" id="img_file" accept=".png, .jpeg, .jpg" aria-describedby="fileInputHelp" onchange="previewFile();">
                    <label class="custom-file-label" for="img_file">اختر الصورة</label>
                    <small id="fileInputHelp" class="form-text text-muted">الصيغ المسموح بها للصور هي PNG و JPEG.</small>
                </div>
                <!-- Image Preview Container -->
                <div class="mt-2">
                    <img id="previewImage" src="{{ !empty($users->img_file) ? asset('uploads/' . $users->img_file) : '' }}" alt="User Image" style="width: 100px; height: 100px;">
                </div>
                @error('img_file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success rounded  btn-sm"  style="width: 200px !important;">حفظ</button>

                    <a href="{{route('Showuser')}}" class="btn btn-info btn-sm" style="width: 200px !important;">العودة</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function previewFile() {
    var file = document.getElementById("img_file").files[0];
    var preview = document.getElementById("previewImage");
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
        preview.style.display = 'block';  // Make sure the preview is visible
    } else {
        preview.src = "";  // If no file is selected, remove the preview
    }
}

    </script>

@endsection
