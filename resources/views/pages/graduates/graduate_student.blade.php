@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
        <h3> <i class="fa-solid fa-graduation-cap mt-3 text-danger ">  الطلاب الخرجين  </i>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a  class="text-dark" href="{{ route('student.show') }}">
                    <i class="fas fa-arrow-left  "></i> الرجوع
                </a>
            </span>
        </div>
    </div>

</div>


<div class="row row-sm">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-3">

        </div>
        <div class="card mt-5">

            <div class="col-xl-12">
                <div class="card-header pb-0">

                    <p class="tx-12 tx-gray-500 mb-2"> ترقيه الطلاب <a href="#">تعرف على المزيد</a></p>

                    <div class="row card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-body">
                                    <form action=" {{route('graduate.store')}} " method="POST">
                                        @csrf
                                        <dir class="text-danger   "> <h3> <i class="fa-solid fa-graduation-cap mb-3"> الخرجين </i> </h3> </dir>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="grade_id" class="form-label">المرحلة الدراسية</label>
                                                <select id="grade_id" name="grade_id" class="form-control" >
                                                    <option value="" disabled selected>المرحلة الدراسية</option>
                                                    @foreach ($Grades as $grade)
                                                        <option value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>
                                                            {{ $grade->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('grade_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <label for="class_id" class="form-label">الصف</label>
                                                <select name="class_id" id="class_id" class="form-control"  >
                                                    <option value="" selected disabled>-- اختر الصف --</option>
                                                </select>
                                                @error('class_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <label for="section_id" class="form-label">القسم</label>
                                                <select id="section_id" name="section_id" class="form-control"  >
                                                    <option value="">اختر القسم -- </option>
                                                </select>
                                                @error('section_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3">
                                                <label for="academic_year" class="form-label">السنة الدراسية</label>
                                                <select id="academic_year" name="academic_year" class="form-control"
                                                    required>
                                                    <option value="">اختر السنة الدراسية</option>
                                                    @php
                                                        $current_year = date("Y");
                                                    @endphp
                                                    @for($year = $current_year; $year <= $current_year + 1; $year++)
                                                        <option value="{{ $year }}" {{ old('academic_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                    @endfor
                                                </select>
                                                @error('academic_year')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <br><br>

                                       
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary">إرسال</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<!-- breadcrumb -->
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


    $(document).ready(function () {
         
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