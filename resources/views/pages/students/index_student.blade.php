@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">  <h3> <i class="fa-solid fa-user-graduate text-danger "> الطلاب </i></h3> </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="">الرجوع</a></span>
        </div>
    </div>
</div>

<div class="row row-sm  ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">    <i class="fa-solid fa-user-graduate  ">  الطلاب </i> </h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
             </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap table table-hover " id="example1">
                        <thead class=" table-secondary  ">
                            <tr class="font-weight-bold">
                             <th>#</th>
                            <th><h5>اسم الطالب</h5></th>
                            <th><h5>البريد الإلكتروني</h5></th>
                            <th><h5>السنة الدراسية</h5></th>
                            <th><h5>المرحلة الدراسية</h5></th>
                            <th><h5>الصف الدراسي</h5></th>
                            <th><h5>القاعه الدراسية</h5></th>
                            <th><h5>تاريخ الميلاد</h5></th>
                            <th><h5>الدولة</h5></th>
                            <th><h5>العمليات</h5></th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)

                                <tr class="font-weight-bold">
                                    <td> {{$loop->iteration}}</td>
                                    <td class="text-primary"> {{$student->name}}</td>
                                    <td class="text-secondary"> {{$student->email}}</td>
                                    <td class="text-danger"> {{$student->academic_year}}</td>
                                    <td class="text-primary"> {{$student->gradeStudent->name}}</td>
                                    <td class="text-primary"> {{$student->classStudent->nameClass}}</td>
                                    <td class="text-primary"> {{$student->sectionStudent->nameSectian}}</td>
                                    <td class="text-danger"> {{$student->date_birth}}</td>
                                    <td class="text-primary"> {{$student->nationalitieStudent->name}}</td>
                                    <td class="text-primary">

                                    <div class="dropdown show">
                                <a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-cogs"></i> العمليات
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item text-success" href="{{route('student.edit', $student->id)}}">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>
                                    <button class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#exampleModalCenter{{$student->id}}">
                                        <i class="fas fa-trash-alt"></i> حذف
                                    </button>
                                    <a class="dropdown-item text-warning" href="{{route('student.show_student', $student->id)}}">
                                        <i class="far fa-eye"></i> عرض
                                    </a>
                                    <a class="dropdown-item text-primary" href="{{route( 'feesInvoice.show',$student->id)}}">
                                        <i class="fas fa-file-invoice-dollar"></i> إضافة فاتورة رسوم
                                    </a>
                                </div>
                            </div>
                                
                                    </td>

                                </tr>
                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModalCenter{{$student->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"> عمليه الحذف </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('student.destroy', $student->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                                                    <input type="hidden" name="id" value="{{$student->id}}" id="id">
                                                    <input class="form-control" name="name" value="{{$student->name}}"
                                                        type="text" readonly>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                            اغلاق </button>
                                                        <button type="submit" class="btn btn-danger"> حذف </button>
                                                    </div>
                                                </form>
                                            </div>
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
@endsection
@section('content')
<!-- row -->
<div class="row">

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection