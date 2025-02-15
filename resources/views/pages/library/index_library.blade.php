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
                <h4 class="content-title mb-0 my-auto">
                    <h3> <i class="fa-solid fa-book-open text-primary "> الكتب </i></h3>
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <a href="">الرجوع</a></span>
            </div>
        </div>
    </div>
    <div class="row row-sm  ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">


                    <a href=" {{ route('library.create') }} " class="btn btn-outline-primary mb-3">
                        <i class="fa-solid fa-book-open"> </i> اضافة كتاب
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table table-hover " id="example1">
                            <thead class=" table-secondary  ">
                                <tr class="font-weight-bold">
                                    <th>#</th>


                                    <th>
                                        <h5> المرحلة الدراسية </h5>
                                    </th>
                                    <th>
                                        <h5> الصف الدراسي </h5>
                                    </th>
                                    <th>
                                        <h5> القاعه الدراسية </h5>
                                    </th>
                                    <th>
                                        <h5> اسم الكتب </h5>
                                    </th>


                                    <th>
                                        <h5> العمليات
                                        </h5>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($librarys as $library)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td class="text-primary"> {{$library->grade->name }} </td>
                                        <td class="text-primary"> {{$library->class->nameClass }} </td>
                                        <td class="text-primary"> {{$library->section->nameSectian }} </td> 
                                        <td class="text-primary"> {{$library->nameBook }} </td>
                                        <td> 
                                        @php
                                        $files = json_decode($library->file_name, true);  
                                    @endphp

                                    @if (!empty($files) && is_array($files))
                                        @foreach ($files as $file)
                                            <a href="{{ route('library.download', ['file_name' => basename($file)]) }}" target="_blank">   <i class="fa-solid fa-download text-danger "></i> {{ $library->nameBook }} </a> <br>
                                        @endforeach
                                    @else
                                        <span class="text-danger">لا توجد ملفات</span>
                                    @endif
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