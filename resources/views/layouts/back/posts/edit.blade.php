@extends('layouts.master')
@section('css')
<!-- Nice Select CSS -->
@section('css')


<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">



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

            .chosen-container-multi .chosen-choices li.search-choice {
                float: right !important;
            }
    .custom-file-input {
        cursor: pointer;
    }
    .custom-file-label::after {
        content: "اختر ملف";
    }
</style>

   @endsection
   @section('title')
   المقالات
   @endsection

      @section('intitle')
      <li class="breadcrumb-item"><a href="{{route('posts.index')}}">المقالات</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)"> تعديل المقالات</a></li>
   @endsection
@section('content')


    <div class="card">
        <div class="card-body">
            @include('layouts.back.message')

            <form action="{{route('posts.update',$post->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')

    <div class="mb-3">
        <h4>
            <label for="title">عنوان المقالة</label>

        </h4>
        <input type="text" name="title" id="title"  class="form-control" value="{{ old('title', $post->title )}}"/>
    </div>

    <div class="mb-3">
        <h4>
            <label for="slug">seo - slug </label>

        </h4>
        <input type="text" name="slug" id="slug"  class="form-control"  value="{{ old('title', $post->slug )}}"/>
    </div>
    <div class="mb-3">
        صورة المقالة
        <div class="custom-file" style="position: relative;">
            <input type="file" class="custom-file-input form-control form-control-sm" name="file" id="file" aria-describedby="fileInputHelp" value="{{ old('file', $post->gallery->image) }}">

            <div id="trashIcon" onclick="removeImage()" style="position: absolute; top: 0; left: 0; padding: 0.5rem;">
                <i class="fas fa-trash"></i>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <h4>التصنيف</h4>
        <select name="category_id" id="category_id" class="form-control" id="single-select">
            <option value="" disabled>اختر تصنيف المقالة</option>
            @foreach ($category as $value)
                <option value="{{ $value->id }}" {{ $value->id == $post->category_id ? 'selected' : '' }}>
                    {{ $value->name }}
                </option>
            @endforeach
        </select>
    </div>



        <div class="mb-3">
            <h4>Tags</h4>
            <select class="multi-select form-control" name="tags[]" multiple="multiple"  id="tags">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}" {{$post->tags->contains($tag->id)?"selected='selected":""}}>{{$tag->name}}</option>
           @endforeach
            </select>

        </div>



    <div class="mb-3">

        <h4>  الوصف </h4>

            {{-- <div class="card-body custom-ekeditor">
                <div id="ckeditor" name="description" ></div>
            </div> --}}
            {{-- <div name="" >

            </div> --}}


            <textarea name="description" id="ckeditor" class="form-control" cols="10" rows="5">

                {{ strip_tags(old('description', $post->description) )}}
            </textarea>
    </div>





    <div class="mb-3">
        <h4>
            الحالة
        </h4>
        <select name="status" id="status" class="form-control" id="single-select" >
            <option value="" >اختر حالة المقالة</option>
            <option  value="1" {{$post->status == 1 ? 'selected' : ''}}>نشطة</option>
            <option  value="0" {{$post->status == 0 ? 'selected' : ''}}>غير نشطة</option>
        </select>

    </div>





                   <div class="text-center mt-6">
                    <button type="submit" class="btn btn-success rounded  btn-sm"  style="width: 200px !important;">حفظ</button>

                    <a href="{{route('posts.index')}}" class="btn btn-info btn-sm" style="width: 200px !important;">العودة</a>


                    </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ck editor -->
	<script src="{{asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/select2-init.js')}}"></script>





<script>
    function removeImage() {
        // Clear the file input
        document.getElementById("img_file").value = '';
    }
</script>


@endsection












