@extends('layouts.master')
@section('css')
<!-- Nice Select CSS -->


<style type="text/css">


    /* Define RTL styles */
    .rtl {
        direction: rtl;
        text-align: right;
    }

    </style>

   @endsection
@section('page-title')
تعديل مقالة

<label class="custom-tooltip" style="font-size:16px !important;">

                        <i class="fa fa-info-circle"></i> <!-- Font Awesome icon -->
                            {{-- كل الحقول مطلوبه ما عدا حقل تاكيد بريد --}}
                    </label>
@endsection
@section('content')

<div class="container ">

    <div class="card">
        <div class="card-body">

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
                <h4>Tags</h4>
                <select class="select mt-3 form-control" name="tags[]" multiple id="tags">
                    @foreach($tags as $tag)
                         <option value="{{$tag->id}}" {{$post->tags->contains($tag->id)?"selected='selected":""}}>{{$tag->name}}</option>
                    @endforeach
                 </select>
        </div>



    <div class="mb-3">
        <h4>
            الوصف
        </h4>
        <textarea id="description" name="description" >{{ old('description', $post->description )}}</textarea>


    </div>


    <div class="mb-3">
        <h4>
            الحالة
        </h4>
        <select name="status" id="status" class="form-control">
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
</div>
@endsection
@section('scripts')

<script  type="text/javascript">
    tinymce.init({
      selector: '#description'
    });


  </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tagsSelect = document.getElementById('tags');
        var previousSelection = Array.from(tagsSelect.options).filter(option => option.selected).map(option => option.value);

        tagsSelect.addEventListener('change', function() {
            var selectedOptions = Array.from(tagsSelect.options).filter(option => option.selected).map(option => option.value);
            if (selectedOptions.length > 1) {
                // إذا تم اختيار أكثر من علامة واحدة، قم بإلغاء تحديد العلامات السابقة واحتفظ فقط بالعلامة الأخيرة المحددة
                previousSelection.forEach(tagId => {
                    if (!selectedOptions.includes(tagId)) {
                        document.querySelector('option[value="' + tagId + '"]').selected = false;
                    }
                });
                previousSelection = [selectedOptions[selectedOptions.length - 1]];
            } else {
                // إذا تم اختيار علامة واحدة فقط، احفظها في القائمة للاستخدام في الإلغاء في المرة القادمة
                previousSelection = selectedOptions;
            }
        });
    });
</script>



@endsection












