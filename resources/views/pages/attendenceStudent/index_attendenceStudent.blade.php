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
                <h3><i class="fa-solid fa-eye text-primary "> قائمة الحضور والغياب للطلاب </i></h3>
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="">الرجوع</a></span>
        </div>
    </div>
</div>

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">
                    <i class="fa-solid fa-eye text-primary "></i>   التاريخ :
                        <span class="text-danger"> {{ now()->translatedFormat('d F Y') }} </span>
                    </h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

                <h3 class="text-danger text-center"> <span class="text-primary"> تاريخ اليوم : </span>
                    {{ date('Y-m-d') }}</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{route('attendence.store')}}" method="POST">    
                    @csrf

                        <table class="table text-md-nowrap table-hover" id="example1">
                            <thead class="table-secondary">
                                <tr class="font-weight-bold">
                                    <th>#</th>
                                    <th>
                                        <h5>اسم الطالب</h5>
                                    </th>
                                    <th>
                                        <h5>القاعه الدراسية</h5>
                                    </th>
                                    <th>
                                        <h5>المرحلة الدراسية</h5>
                                    </th>
                                    <th>
                                        <h5>الصف الدراسي</h5>
                                    </th>
                                    <th>
                                        <h5>السنة الدراسية</h5>
                                    </th>
                                    <th>
                                        <h5>الحضور والغياب</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="font-weight-bold">
                                        <td class="text-primary">{{ $loop->index + 1 }}</td>
                                        <td class="text-primary">{{ $student->name }}</td>
                                        <td class="text-primary">{{ $student->sectionStudent->nameSectian }}</td>
                                        <td class="text-primary">{{ $student->gradeStudent->name }}</td>
                                        <td class="text-primary">{{ $student->classStudent->nameClass }}</td>
                                        <td class="text-primary">{{ $student->academic_year }}</td>
                                       
                                            <td>
                                        @php
                                           
                                            $attendance = $student->attendece()->where('attendence_date', date('Y-m-d'))->first();
                                        @endphp

                                        @if ($attendance)
                                            <label>
                                                <input type="radio" name="attendences[{{ $student->id }}]" disabled
                                                    {{ optional($attendance)->attendence == 1 ? 'checked' : '' }}>
                                                <span class="text-primary">حضور</span>
                                            </label>

                                            <label>
                                                <input type="radio" name="attendences[{{ $student->id }}]" disabled
                                                    {{ optional($attendance)->attendence == 0 ? 'checked' : '' }}>
                                                <span class="text-danger">غياب</span>
                                            </label>

                                        @else
                                            <label>
                                                <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                    type="radio" value="presence">
                                                <span class="text-primary"><strong> حضور </strong></span>
                                            </label>

                                            <label>
                                                <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                    type="radio" value="absent">
                                                <span class="text-danger"><strong> غياب </strong></span>
                                            </label>

                                            <input type="hidden" name="studentId[]" value="{{ $student->id }}">
                                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                            <input type="hidden" name="class_id" value="{{ $student->class_id }}">
                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                        @endif
                                    </td>


                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success  mb-3 "> تاكيد </button>
                    </form>
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