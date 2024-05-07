@extends('layouts.master')

@section('title')
التصنيفات
@endsection
@section('content')







   @section('intitle')
   <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a></li>
   <li class="breadcrumb-item active"><a href="javascript:void(0)"> كل التصنيفات</a></li>
@endsection



<button type="button" class="btn btn-success add-btn mt-4 mb-4 rounded" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1 " ></i> اضافه</button>


@include('layouts.back.message')
                        <table class="table table-bordered table-striped" id="customerTable" style="width: 100% !important;">
                            <thead >
                                <tr>


                                    <th >#</th>

                                    <th >اسم التصنيف</th>

                                    <th >العمليات</th>
                                </tr>
                            </thead>

                            <tbody class="list form-check-all">
                                <?php $id = 0; ?>
                                @forelse ($tags as $tag)
                                <?php $id++; ?>

                                <tr>

                                    <td class="#">{{$id}}</td>


                                    <td class="tag_name">{{$tag->name}}</td>

                                    <td>
                                        <div class="d-flex gap-2 ml-4">
                                            <div class="edit mr-2">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editshowModal{{ $tag->id }}">تعديل</button>
                                            </div>

                                                <div class="remove">
                                                    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$tag->id}}">حذف</button>
                                                </div>


                                        </div>
                                    </td>
                                </tr>






<div class="modal fade" id="editshowModal{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>

            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="{{route('tags.update',$tag->id)}}">
                @csrf
                @method('PUT')

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="name" class="form-label">اسم التنصيف</label>
                        <input type="text"  class="form-control" placeholder=" " name="name" value="{{$tag->name}}" required />
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                     <button type="submit" class="btn btn-success" >نحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal fade zoomIn" id="deleteRecordModal{{$tag->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <form  action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>هل أنت متأكد ؟</h4>
                            <p class="text-muted mx-4 mb-0">هل أنت متأكد أنك تريد إزالة هذا السجل ؟ </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn w-sm btn-danger" >نعم، احذفها!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>








                                @empty

                                <tr class="text-center ">
                                    <td colspan="100%" >لم يجد سجل لذلك</td>
                                </tr>



                                @endforelse

                            </tbody>
                        </table>

                    </div>



                </div>
            </div><!-- end card -->
        </div>










<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="{{route('tags.store')}}">
@csrf

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="customername-field" class="form-label">اسم التصنيف</label>
                        <input type="text" id="customername-field" class="form-control" placeholder="اكتب الاسم " required  name="name"/>
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-success" id="add-btn"> اضافه مستخدم</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>













@endsection
