@extends('layouts.master')

@section('css')
<!-- Internal Data table CSS -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Add Bootstrap Icons CDN link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
@livewireStyles

<style>
    /* تخصيص شكل dropdown */
    .dropdown-menu a {
        color: #333;
        font-weight: bold;
        padding: 10px 20px;
        display: flex;
        align-items: center;
    }

    .dropdown-menu a .icon {
        margin-right: 10px;
    }

    /* تخصيص جدول البيانات */
    #example1 {
        width: 100%;
        border-collapse: collapse;
    }

    #example1 th,
    #example1 td {
        text-align: center;
        vertical-align: middle;
    }

    #example1 th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصفحات</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-arrow-left"></i> الرجوع
                </a>
            </span>

        </div>
    </div>
</div>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- button return -->
<a wire:navigate class="btn btn-secondary  mb-2" href='{{ route('class.index') }}'">
        <i class=" bi bi-arrow-left"></i> الرجوع
</a>

<!-- button add -->
<button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#add">الاضافه</button>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0 ">
                <div class="d-flex justify-content-between   ">
                    <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap table-hover  " id="example1">
                        <thead>
                            <tr class="font-weight-bold">
                                <th class="fw-bold fs-6 ">#</th>
                                <th class="fw-bold fs-6 ">اسم المرحله</th>
                                <th class="fw-bold fs-6 ">التعليقات</th>
                                <th class="fw-bold fs-6 ">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($grades as $grade)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#update{{$grade->id}}">تعديل</button>

                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $grade->id }}">حذف</button>
                                    </td>
                                </tr>

                                <!-- delete modal -->
                                <div class="modal fade" id="delete{{$grade->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">حذف المرحله الدرسيه</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('page.destroy', $grade->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                    <input type="hidden" name="id" value="{{$grade->id}}" id="id">
                                                    <input class="form-control" name="name" value="{{$grade->name}}"
                                                        type="text" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">المسح</button>
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-dismiss="modal">إغلاق</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- update Modal  -->
                                <div class="modal fade" id="update{{$grade->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل المرحله الدرسيه</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="update" action="{{route('page.update', $grade->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="title">اسم الفصل الدراسي</label>
                                                        <input type="hidden" name="id" value="{{$grade->id}}" id="id">
                                                        <input type="text" name="name" value="{{ $grade->name }}"
                                                            class="form-control" id="title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="des">ملاحظات</label>
                                                        <textarea name="notes" rows="5" class="form-control"
                                                            id="des">{{ $grade->notes }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">تأكيد</button>
                                                    <button type="button" class="btn btn-info"
                                                        data-bs-dismiss="modal">إغلاق</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- add modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافه المرحله الدرسيه</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('page.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">اسم المرحله الدرسيه</label>
                        <input type="text" name="name" value="" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="des">ملاحظات</label>
                        <textarea name="notes" rows="5" class="form-control" id="des">--</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">إضافة</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts

<script>
    $(document).ready(function () {

        $('#example1').DataTable({
            responsive: true,
            language: {
                search: "بحث:",
                lengthMenu: "عرض _MENU_ صفوف",
                zeroRecords: "لا توجد بيانات متاحة",
                info: "عرض الصفحة _PAGE_ من _PAGES_",
                infoEmpty: "لا توجد سجلات متاحة",
                infoFiltered: "(تمت التصفية من _MAX_ إجمالي السجلات)"
            }
        });
    });


</script>
@endsection