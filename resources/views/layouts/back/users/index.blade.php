@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style>
    /* Custom CSS to center pagination */

    .dataTables_wrapper .dataTables_paginate {
    text-align: center;
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
المستخدمين
@endsection

   @section('intitle')
   <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a></li>
   <li class="breadcrumb-item active"><a href="javascript:void(0)"> كل المستخدمين</a></li>
@endsection

@section('content')
    {{-- <a href="{{ route('Adduser') }}" class="btn btn-info mb-3">Add</a> --}}
    @include('layouts.back.message')



	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> جميع المستخدمين</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="users" class="display min-w850">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th> تأكيد البريد الالكتروني</th>
                                <th> رقم الهاتف  </th>
                                <th>الصلاحيات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>




                        <tbody>


                            <?php $i = 0 ?>
                            @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <?php $i++; ?>

                            <tr>


                                <td>{{ $i }}</td>
                                <td>{{ $user->name }}</td>
                                <td><a href="javascript:void(0);"><strong>{{ $user->email }}</strong></a></td>
                                <td>
                                    {{ $user->email_verified_at ? 'مفعل' : 'غير مفعل ' }}
                                </td>
                                <td><a href="javascript:void(0);"><strong>   {{$user->Phone}}</strong></a></td>


                                <td>{{ $user->is_admin ? 'نعم' : 'لا' }}</td>






                                <td>
                                    <div class="d-flex">
                            <button class=" btn  btn-success shadow btn-xs sharp me-1 " data-bs-toggle="modal" data-bs-target="#showModal{{ $user->id }}">
                                <i class="fa fa-solid fa-eye"></i>
                            </button>

                                        <a href="{{route('Edituser',$user->id)}}"class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>

                                        <form class="deleteForm" action="{{ route('Deleteuser', $user->id) }}" method="POST" style="display: inline-block !important;">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger shadow btn-xs sharp remove-item-btn" onclick="return confirmDelete();"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>


                            </tr>




































<div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">عرض المستخدم</h5>

            </div>

                <div class="modal-body">

                        <input type="hidden" name="" id="" value="{{$user->id}}" readonly >
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المستخدم</label>
                        <input type="text"  class="form-control" placeholder=" " name="name" value="{{$user->name}}" required  readonly/>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الألكتروني</label>
                        <input type="email"  class="form-control" placeholder=" " name="email"  value="{{$user->email}}" required readonly   />
                    </div>
                    <div class="mb-3">
                        <label for="userProfileImage" class="form-label">صوره الملف الشخصي</label>
                        <div>
                          <img src="{{ asset('uploads/' . $user->img_file) }}" alt="User Image" id="userProfileImage" class="img-fluid rounded avatar-xl">
                        </div>
                      </div>


                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">اغلاق</button>
                        {{-- <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button> --}}
                    </div>
                </div>
        </div>
    </div>
</div>




<div class="modal fade" id="deleteRecordModal{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تأكيد عملية الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Deleteuser', $user->id) }}" method="POST" id="confirmDeleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>هل انت متأكد ؟</h4>
                            <p class="text-muted mx-4 mb-0">هل تريد حذف هذا المستخدم ؟ </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-2">
                        <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">الغاء</button>
                        <span class="mx-1"></span> <!-- هنا المسافة -->
                        <button type="submit" class="btn btn-danger btn-sm mx-2">  حذف </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function confirmDelete() {
        $('#deleteRecordModal{{$user->id}}').modal('show');
        return false; // Prevents the form submission
    }
</script>


                @endforeach


@else
<td colspan="100%" class="text-center">ليس هناك مستخدمين</td>




@endif
            </tbody>
        </table>
    </div>
</div>
        </div></div>
@endsection

@section('scripts')

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
$(document).ready(function() {
    $('#users').DataTable({

        "searching": true, // Enable searching in the DataTable
    });
});

</script>


@endsection
