@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style>
    /* Custom CSS to center pagination */

    .dataTables_wrapper .dataTables_paginate {
    text-align: center;
    display: none !important;
    margin-top: 20px; /* Adjust margin-top as needed */
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    background: #faebd7 !important;
    margin: 0 5px; /* Adjust margin as needed */
}
.dataTables_wrapper .dataTables_paginate .paginate_button.previous, .dataTables_wrapper .dataTables_paginate .paginate_button.next {
    background: #faebd7 !important;
    color: #000 !important;
    margin: 0 10px;
    border: 0px solid var(--primary) !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover,
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #f0dcb3 !important; /* Adjust hover and active state background color */
}

[data-theme-version="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button {
    background: #202020 !important;
    color: white !important;
}

[data-theme-version="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
[data-theme-version="dark"] .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #333333 !important; /* Adjust hover and active state background color for dark theme */
}


</style>
@endsection


@section('title')
المقالات
@endsection

   @section('intitle')
   <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a></li>
   <li class="breadcrumb-item active"><a href="javascript:void(0)"> كل المقالات</a></li>
@endsection
@section('content')
    @include('layouts.back.message')
    <div class="card card-body">

    <div class="table-responsive box">

        <table id="posts" class="table table-striped table-bordered" style="width:100%" data-search="true">


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
                                <span class="badge bg-secondary">No tags</span>
                            @endif
                        </td>

                        <td>
                            <span class="badge badge-info">{{ $post->category->name }}</span>
                        </td>

                        <td>
                            <span class="badge badge-{{ $post->status ? 'success' : 'danger' }}">{{ $post->status ? 'مفعل' : 'غير مفعل' }}</span>
                        </td>

                        <td>
                            {{Auth()->user()->name}}
                        </td>
                        <td>


                            {{-- <a href="{{route('Show',$user->id)}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewModal{{$user->id}}" >عرض</a> --}}

                                {{-- <button class="btn btn-sm btn-success " data-toggle="modal" data-target="#showModal{{ $user->id }}">عرض</button> --}}

                            <a href="{{route('posts.edit',$post->id)}}" class="btn  btn-sm btn-info"><i class="fa fa-pencil color-muted"></i></a>



                            <form class="deleteForm" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block !important;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('delete')

                              <!-- Button to open the modal -->
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$post->id}}">
    <i class="fas fa-times color-danger"></i>
</button>

                            </form>

                        </td>
                    </tr>







<!-- Modal Definition -->
<div class="modal fade zoomIn" id="deleteRecordModal{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

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
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">اغلاق</button>
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

        {{ $posts->links('vendor.pagination.semantic-ui') }}


    </div>
</div>

@endsection

@section('scripts')

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
$(document).ready(function() {
    $('#posts').DataTable({

        "searching": true, // Enable searching in the DataTable
    });
});

</script>

@endsection
