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
@section('page-title')
اضافه مقالة

<label class="custom-tooltip" style="font-size:16px !important;">

                        <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                            {{-- كل الحقول مطلوبه ما عدا حقل تاكيد بريد --}}
                    </label>
@endsection
@section('content')

<div class="container ">

    <div class="card">
        <div class="card-body">

            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @include('layouts.back.message')

    <div class="mb-3">
        <h4>
            <label for="title">عنوان المقالة</label>

        </h4>
        <input type="text" name="title" id="title"  class="form-control"/>
    </div>

    <div class="mb-3">
        <h4>
            <label for="slug">seo - slug </label>

        </h4>
        <input type="text" name="slug" id="slug"  class="form-control"/>
    </div>

    <div class="mb-3">
        <h4>
            <label for="file">اختر صورة </label>

        </h4>
        <input type="file" name="file" id="file"  class="form-control" />
    </div>


    <div class="mb-3">

        <h4>  التصنيف </h4>
        <select name="category_id" id="category_id" class="form-control">
            <option value=""  disabled>اختر تصنيف المقالة  </option>

           @foreach ($category as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
           @endforeach


        </select>
    </div>


    <div class="mb-3">
        <h4>
            الوصف
        </h4>
        <textarea id="description" name="description" ></textarea>


    </div>
    <div class="mb-3">
        <h4>Tags</h4>
        <!-- Corrected name attribute to 'tags[]' for array data handling -->
        <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true" title="اختر">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>



    <div class="mb-3">
        <h4>
            الحالة
        </h4>
        <select name="status" id="status" class="form-control">
            <option value="" >اختر حالة المقالة</option>
            <option  value="1" >نشطة</option>
            <option  value="0" >غير نشطة</option>


        </select>

    </div>





                   <div class="text-center mt-6">
                    <button type="submit" class="btn btn-success rounded  btn-sm"  style="width: 200px !important;">حفظ</button>

                    <a href="{{route('posts.index')}}" class="btn btn-info btn-sm" style="width: 200px !important;">العودة</a>


                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')




<script>
    tinymce.init({
      selector: '#description'
    });
  </script>
@endsection












