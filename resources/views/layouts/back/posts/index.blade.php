@extends('layouts.master')

@section('css')

@endsection

@section('page-title')
المقالات
@endsection

@section('content')
<div class="container">
    @include('layouts.back.message')
    <div class="table-responsive card">
        <table  class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصورة</th>

                    <th>العنوان</th>

                    <th> الفئة   </th>
                    <th> التصنيفات  </th>

                    <th>الحالة</th>

                    <th> الكاتب  </th>

                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>
                            @if (!empty($post->gallery))
                            <img src="{{ asset('storage/posts/') . '/' . $post->gallery->image}}" alt="" width="150px" height="80px">
                        @endif

                        </td>

                        <td>{{ $post->title }}</td>

                        {{-- <td>{{ Str::limit($post->description,15 )}}</td> --}}

                        <td>
                            @if($post->tags()->count() > 0)
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            @else
                                No tags
                            @endif
                        </td>


                        <td>{{ $post->category->name }}</td>


                        <td>
                            {{ $post->status ? 'مفعل' : 'غير مفعل ' }}
                        </td>
                        <td>
                            {{Auth()->user()->name}}
                        </td>
                        <td>


                            {{-- <a href="{{route('Show',$user->id)}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewModal{{$user->id}}" >عرض</a> --}}

                                {{-- <button class="btn btn-sm btn-success " data-toggle="modal" data-target="#showModal{{ $user->id }}">عرض</button> --}}

                            <a href="{{route('posts.edit',$post->id)}}" class="btn  btn-sm btn-info">تعديل</a>



                            <form class="deleteForm" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block !important;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('delete')

                              <!-- Button to open the modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteRecordModal{{$post->id}}">
    حذف
</button>

                            </form>

                        </td>
                    </tr>







<!-- Modal Definition -->
<div class="modal fade zoomIn" id="deleteRecordModal{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <h4>هل أنت متأكد؟</h4>
                        <p class="text-muted mx-4 mb-0">هل أنت متأكد أنك تريد إزالة هذا السجل؟</p>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn w-sm btn-danger">نعم، احذفها!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

                @endforeach


@else
<td colspan="100%" class="text-center">ليس هناك مستخدمين</td>




@endif
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')


@endsection
