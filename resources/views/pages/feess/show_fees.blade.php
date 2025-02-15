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


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><i class="fa-solid fa-school"> قائمة الرسوم الدراسيه </i></h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{ route('fees.index') }}">
                    <i class="fas fa-arrow-left"></i> الرجوع
                </a>
            </span>
        </div>
    </div>
</div>



<div class="card mg-b-20" id="tabs-style2">
    <div class="card-body">
        <div class="text-wrap">
            <div class="example">
                <div class="panel panel-primary tabs-style-2">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab"> المصاريف الدراسية
                                            <strong class=" text-danger">{{$feess->grade->name}}</strong> </a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab"> طلاب المرحله الدرسيه <strong
                                                class=" text-danger">{{$feess->class->nameClass}}   </strong> </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right border">
                        <div class="tab-content">


                            <div class="tab-pane active" id="tab4">
                                <div class="table-responsive mt-15">

                                    <table class="table table-striped" style="text-align:center">
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <th>
                                                    <h5>اسم الرسوم </h5>
                                                </th>
                                                <td class="  text-center text-primary"> {{$feess->title}} </td>
                                                <th>
                                                    <h5> المرحلة الدراسية </h5>
                                                </th>
                                                <td class="  text-center text-success "> {{$feess->grade->name}} </td>
                                                <th>
                                                    <h5> الصف الدراسي </h5>
                                                </th>
                                                <td class=" text-center text-success"> {{$feess->class->nameClass}}
                                                </td>
                                            </tr>

                                            <tr class="font-weight-bold">
                                                <th>
                                                    <h5> المصاريف </h5>
                                                </th>
                                                <td class=" text-center text-danger"> {{$feess->amount}} </td>
                                                <th>
                                                    <h5> السنة الدراسية </h5>
                                                </th>
                                                <td class=" text-center text-danger"> {{$feess->year}} </td>
                                                <th>
                                                    <h5> الملاحظات </h5>
                                                </th>
                                                <td class=" text-center"> {{$feess->desc}} </td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <th> تم إنشاؤه في </th>
                                                <td class="text-danger">{{$feess->created_at  }}</td>
                                                <th>تم التحديث في </th>
                                                <td class="text-danger">{{$feess->updated_at}}</td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="tab-pane" id="tab5">
                                <div class="table-responsive mt-4">



                                    <h4 class="mt-5 mb-3 text-center">قائمة طلاب المرحله الدرسيه <strong
                                            class=" text-danger">{{$feess->grade->name}}</strong> سنه  <span class="text-danger" > {{ $feess->year }}</span> </h4>
                                    <table class="table text-md-nowrap table mt-4 " id="example1">
                                        <thead class="  table-secondary">
                                            <tr class="font-weight-bold">
                                                <th>#</th>
                                                <th>
                                                    <h5>اسم الطالب</h5>
                                                </th>
                                                <th>
                                                    <h5>البريد الإلكتروني</h5>
                                                </th>
                                                <th>
                                                    <h5>السنة الدراسية</h5>
                                                </th>
                                                <th>
                                                    <h5>المرحلة الدراسية</h5>
                                                </th>
                                                <th>
                                                    <h5>الصف الدراسي</h5>
                                                </th>
                                                <th>
                                                    <h5>القاعه الدراسية</h5>
                                                </th>
                                                <th>
                                                    <h5>  العمليات </h5>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student as $stud)
                                                <tr class="font-weight-bold">

                                                    <td class="text-primary"> {{ $loop->iteration }}</td>
                                                 
                                                    <td class="  text-danger"> {{ $stud->name }}</td>
                                                    <td class="text-secondary"> {{ $stud->email }}</td>
                                                    <td class="text-danger"> {{ $stud->academic_year }}</td>
                                                    <td class="text-primary"> {{ $stud->gradeStudent->name   }}</td>
                                                    <td class="text-primary"> {{ $stud->classStudent->nameClass   }}</td>
                                                    <td class="text-primary">{{ $stud->sectionStudent->nameSectian   }}</td>
                                                    <td>
                                                    <div class="dropdown show">
                                <a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-cogs"></i>  <strong>العمليات</strong> 
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item text-success" href="{{route('student.edit', $stud->id)}}">
                                        <i class="fas fa-edit"></i>   <strong>تعديل</strong>
                                    </a>
                                    <button class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#exampleModalCenter{{$stud->id}}">
                                        <i class="fas fa-trash-alt"></i> <strong> حذف </strong>
                                    </button>
                                    <a class="dropdown-item text-primary" href="{{route('student.show_student', $stud->id)}}">
                                        <i class="far fa-eye"></i> <strong>عرض</strong>  
                                    </a>
                                    <a class="dropdown-item text-primary" href="{{route('receipt.show',$stud->id)}}">
                                    <i class="fa-solid fa-receipt"></i> <strong>  اضافه سند قبض </strong>
                                    </a>
                                    <a class="dropdown-item text-dark" href="{{route( 'feesInvoice.show',$stud->id)}}">
                                        <i class="fas fa-file-invoice-dollar"></i>  <strong>إضافة فاتورة رسوم </strong>
                                    </a>
                                    <a class="dropdown-item text-danger" href="{{route('processfees.show',$stud->id)}} ">
                                    <i class="fa-solid fa-file-excel"></i> <strong> استبعاد  رسوم </strong>
                                    </a>
                                </div>
                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>




                        </div>
                    </div>
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