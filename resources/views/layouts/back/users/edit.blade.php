@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">

<style>
    /* Define RTL styles */
    .rtl {
        direction: rtl;
        text-align: right;
    }

    </style>

    @endsection
    @section('title')
    المستخدمين
    @endsection

       @section('intitle')
       <li class="breadcrumb-item"><a href="{{route('Showuser')}}">المستخدمين</a></li>
       <li class="breadcrumb-item active"><a href="javascript:void(0)">تعديل مستخدم</a></li>
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
            صوره الملف الشخصي
            <div class="custom-file" style="position: relative;">
                <input type="file" class="custom-file-input form-control form-control-sm" name="img_file" id="img_file" accept=".png, .jpeg, .jpg" aria-describedby="fileInputHelp">
                <div id="trashIcon" onclick="removeImage()" style="position: absolute; top: 0; left: 0; padding: 0.5rem;">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        </div>
        <div class="mb-3">

            <div class="form-group">
                <strong>Role:</strong>
                <select name="roles[]" class="multi-select form-control"  multiple="multiple" >
                    @foreach($roles as $roleName)

                        <option value="{{ $roleName }}" >{{ $roleName  }}</option>
                        @endforeach

                </select>
            </div>


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
    function removeImage() {
        // Clear the file input
        document.getElementById("img_file").value = '';
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/select2-init.js')}}"></script>

@endsection
