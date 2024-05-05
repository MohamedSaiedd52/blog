@extends('layouts.master')

@section('css')

@endsection

@section('page-title')
المستخدمين
@endsection

@section('content')
<div class="container">
    {{-- <a href="{{ route('Adduser') }}" class="btn btn-info mb-3">Add</a> --}}
    @include('layouts.back.message')
    <div class="table-responsive card">
        <table  class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    {{-- <th>صوره المسنخدم</th> --}}

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

                        {{-- <td>
                            <img src="{{ asset('uploads/' . $user->img_file) }}" alt="User Image" width="50px" height="50px" class="img-fluid rounded " style="border-radius:50% !important;max-width:150px !important;">

                        </td> --}}

                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->email_verified_at ? 'مفعل' : 'غير مفعل ' }}
                        </td>
                        <td>
                            {{$user->Phone}}
                        </td>
                        <td>{{ $user->is_admin ? 'نعم' : 'لا' }}</td>
                        <td>


                            {{-- <a href="{{route('Show',$user->id)}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewModal{{$user->id}}" >عرض</a> --}}

                                <button class="btn btn-sm btn-success " data-toggle="modal" data-target="#showModal{{ $user->id }}">عرض</button>

                            <a href="{{route('Edituser',$user->id)}}" class="btn  btn-sm btn-info">تعديل</a>



                            <form class="deleteForm" action="{{ route('Deleteuser', $user->id) }}" method="POST" style="display: inline-block !important;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('delete')

                                <button class="btn btn-sm btn-danger remove-item-btn" data-toggle="modal" data-target="#deleteRecordModal{{$user->id}}">حذف</button>

                                {{-- <button class="btn btn-danger btn-sm deleteButton" type="submit">حذف</button> --}}
                            </form>

                        </td>
                    </tr>



{{-- show modal  --}}


<div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">عرض المستخدم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  </button>
            </div>

                <div class="modal-body">

                        <input type="hidden" name="" id="" value="{{$user->id}}" readonly >
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المستخدم</label>
                        <input type="text"  class="form-control" placeholder=" " name="name" value="{{$user->name}}" required />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الألكتروني</label>
                        <input type="email"  class="form-control" placeholder=" " name="email"  value="{{$user->email}}" required  />
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
                        <button type="button" class="btn btn-light" data-dismiss="modal">اغلاق</button>
                        {{-- <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button> --}}
                    </div>
                </div>
        </div>
    </div>
</div>




<div class="modal fade zoomIn" id="deleteRecordModal{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form  action="{{ route('Deleteuser', $user->id) }}" method="POST">
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
