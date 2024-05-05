@extends('layouts.master')


@section('content')






            @section('page-title')
                       المدونه / الفئات
@endsection




<button type="button" class="btn btn-success add-btn mt-4 mb-4 rounded" data-toggle="modal" id="create-btn" data-target="#showModal"><i class="ri-add-line align-bottom me-1 " ></i> اضافه</button>



                        <table class="table table-bordered table-striped" id="customerTable" style="width: 100% !important;">
                            <thead class="table-light">
                                <tr>


                                    <th class="sort" data-sort="sn">#</th>

                                    <th class="sort" data-sort="Username">اسم الفئة</th>

                                    <th class="sort" data-sort="action">العمليات</th>
                                </tr>
                            </thead>

                            <tbody class="list form-check-all">
                                <?php $id = 0; ?>
                                @forelse ($cats as $cat)
                                <?php $id++; ?>

                                <tr>

                                    <td class="#">{{$id}}</td>


                                    <td class="cat_name">{{$cat->name}}</td>

                                    <td>
                                        <div class="d-flex gap-2 ml-4">
                                            <div class="edit mr-2">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-toggle="modal" data-target="#editshowModal{{ $cat->id }}">تعديل</button>
                                            </div>

                                                <div class="remove">
                                                    <button class="btn btn-sm btn-danger remove-item-btn" data-toggle="modal" data-target="#deleteRecordModal{{$cat->id}}">حذف</button>
                                                </div>


                                        </div>
                                    </td>
                                </tr>






<div class="modal fade" id="editshowModal{{ $cat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="{{route('categories.update',$cat->id)}}">
                @csrf
                @method('PUT')

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المستخدم</label>
                        <input type="text"  class="form-control" placeholder=" " name="name" value="{{$cat->name}}" required />
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-dismiss="modal">اغلاق</button>
                     <button type="submit" class="btn btn-success" >نحديث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<div class="modal fade zoomIn" id="deleteRecordModal{{$cat->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form  action="{{ route('categories.destroy', $cat->id) }}" method="POST">
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
                        <button type="button" class="btn w-sm btn-light" data-dismiss="modal">اغلاق</button>
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
                <h5 class="modal-title" id="exampleModalLabel">اضافه فئة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="tablelist-form" autocomplete="off" method="POST" action="{{route('categories.store')}}">
@csrf

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="customername-field" class="form-label">اسم الفئة</label>
                        <input type="text" id="customername-field" class="form-control" placeholder="اكتب الاسم " required  name="name"/>
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-success" id="add-btn"> اضافه مستخدم</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>













@endsection
