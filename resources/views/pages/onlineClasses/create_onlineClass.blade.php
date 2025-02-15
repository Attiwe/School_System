@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto  ">
                    <h2><i class="fa-brands fa-cloudflare text-primary font-weight-bold "> اضافه حصه </i></h2>
                </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <a href="{{ route('onlineClasses.index') }}">
                        <i class="fas fa-arrow-left"></i> الرجوع
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

                        <p class="tx-12 tx-gray-500 mb-2"> اضافه حصص <a href="#">تعرف على المزيد</a></p>
                        <div class=" text-center mb-4">

                        </div>

                        <div class="row card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <form action="{{ route('onlineClasses.store') }}" method="POST" autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label for="grade_id" class="form-label">المرحلة الدراسية</label>
                                                    <select id="grade_id" name="grade_id" class="form-control" required>
                                                        <option value="" disabled selected>المرحلة الدراسية</option>
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
                                                    <select name="class_id" id="class_id" class="form-control" required>
                                                        <option value="" selected disabled>-- اختر الصف --</option>
                                                    </select>
                                                    @error('class_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-3 mb-3">
                                                    <label for="section_id" class="form-label">القسم</label>
                                                    <select id="section_id" name="section_id" class="form-control" required>
                                                        <option value="">اختر القسم -- </option>
                                                    </select>
                                                    @error('section_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label"> عنون الحصه </label>
                                                    <input type="text" id="topic" name="topic" class="form-control"
                                                        value="{{ old('topic') }}" required>
                                                    @error('topic')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-3 mb-3">
                                                    <label for="start_time" class="form-label"> تاريخ ووقت الحصه <span
                                                            class="text-danger"></span> </label>
                                                    <input type="datetime-local" id="start_time" name="start_time"
                                                        class="form-control" value="{{ old('start_time') }}" required>
                                                    @error('start_time')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-3 mb-3">
                                                    <label for="duration" class="form-label"> مده الحصه بالدقائق </label>
                                                    <input type="text" id="duration" name="duration" class="form-control"
                                                        value="{{ old('duration') }}" required>
                                                    @error('duration')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" mt-4">
                                                <button type="submit" class="btn btn-primary"> تاكيد </button>
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


    <!-- breadcrumb -->
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

            // Ajax for dynamic section selection
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