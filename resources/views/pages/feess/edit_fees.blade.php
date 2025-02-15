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
            <h4 class="content-title mb-0 my-auto">  <h3> <i class="fa-solid fa-calculator text-secondary ">  اضافه الرسوم الدراسيه  </i></h3> </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{route('fees.index')}}">الرجوع</a></span>
        </div>
    </div>
</div>

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
<div class="row row-sm">  
    <div class="col-xl-12">
        <div class="card mt-5">
            <div class="col-xl-12">
                <div class="card-header pb-0">
                    <p class="tx-12 tx-gray-500 mb-2">ترقية الطلاب <a href="#">تعرف على المزيد</a></p>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{route('fees.update',$fees->id)}} " method="POST"  >
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$fees->id}}">
                                      <div class="col-12 col-md-6 mb-3">
                                        <label for="title" class="form-label">اسم الرسوم</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title',$fees->title) }}" required autocomplete="off">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="amount" class="form-label">المصاريف</label>
                                        <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount',$fees->amount) }}" required autocomplete="off" numeric  required>
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="grade_id" class="form-label">المرحلة الدراسية</label>
                                        <select id="grade_id" name="grade_id" class="form-control" required>
                                            <option value=" ">   {{$fees->grade->name}} </option>
                                             @foreach ($Grades as $grade)
                                                <option value="{{$grade->id}}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('grade_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-3 mb-3">
                                        <label for="class_id" class="form-label">الصف</label>
                                        <select name="class_id" id="class_id" class="form-control"  >
                                            <option value="">  {{$fees->class->nameClass}}  </option>
                                         </select>
                                        @error('class_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-3 mb-3">
                                        <label for="year" class="form-label">السنة الدراسية</label>
                                        <select id="year" name="year" class="form-control"  >
                                            <option value=""> {{ $fees->year}}  </option>
                                             @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year = $current_year; $year <= $current_year + 1; $year++)
                                                <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                        @error('year')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                        <label for="desc" class="form-label">الملاحظات</label>
                                        <textarea name="desc" id="desc"  class="form-control"   > {{$fees->desc}}</textarea>
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                <div class="mb-3 mt-4">
                                    <button type="submit" class="btn btn-primary">إرسال</button>
                                </div>
                            </form>
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

<script>
    $(document).ready(function () {
        // Ajax for dynamic class selection
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ url('student/class') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="class_id"]').empty();
                        $('select[name="class_id"]').append('<option value="" selected disabled>-- اختر الصف --</option>');
                        $.each(data, function (key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function () {
                        console.log('AJAX load failed');
                    }
                });
            } else {
                $('select[name="class_id"]').empty();
            }
        });

         $('select[name="class_id"]').on('change', function () {
            var class_id = $(this).val();
            if (class_id) {
                $.ajax({
                    url: "{{ url('student/section') }}/" + class_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option value="" selected disabled>-- اختر القسم --</option>');
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function () {
                        console.log('AJAX load failed');
                    }
                });
            } else {
                $('select[name="section_id"]').empty();
            }
        });
    });


    
</script>

@endsection