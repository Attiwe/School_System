@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto  "> <h2><i class="fa-solid fa-user-tie"> اضافه طالب </i></h2> </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{ route('student.show') }}">
                    <i class="fas fa-arrow-left"></i> الرجوع
                </a>
            </span>
        </div>
    </div>
</div>

@if (!empty($catchError))
        <div class="alert alert-danger" id="error-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-3">

        </div>
        <div class="card mt-5">

            <div class="col-xl-12">
                <div class="card-header pb-0">

                    <p class="tx-12 tx-gray-500 mb-2"> اضافه الطلاب <a href="#">تعرف على المزيد</a></p>
                    <div class=" text-center mb-4" > <h3>  اضافه الطلاب  </h3> </div>
  
                    <div class="row card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-body">
                                    <form action="{{route('student.store')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="name" class="form-label">الاسم</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    value="{{ old('name') }}" required autocomplete="off">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3">
                                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="{{ old('email') }}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3">
                                                <label for="password" class="form-label">   كلمه المرور </label>
                                                <input type="password" id="password" name="password"  class="form-control"
                                                    value="{{ old('password') }}" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
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

                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="date_birth" class="form-label">تاريخ الميلاد</label>
                                                <input type="date" id="date_birth" name="date_birth"
                                                    class="form-control" value="{{ old('date_birth') }}" required>
                                                @error('date_birth')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="nationalitie_id"
                                                    class="form-label"><strong>الدولة</strong></label>
                                                <select name="nationalitie_id" class="form-control" id="nationalitie_id"
                                                    required>
                                                    <option value="" selected disabled>-- اختر الدولة --</option>
                                                    @foreach ($nationalities as $nationalitie)
                                                        <option value="{{$nationalitie->id}}" {{ old('nationalitie_id') == $nationalitie->id ? 'selected' : '' }}>
                                                            {{$nationalitie->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('nationalitie_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label"> النوع </label>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="genderMale" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="genderMale">ذكر</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="genderFemale" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="genderFemale">أنثى</label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="blood_id" class="form-label">فصيلة الدم</label>
                                                <select id="blood_id" name="blood_id" class="form-control" required>
                                                    <option value="" selected disabled> -- فصيلة الدم -- </option>
                                                    @foreach ($bloods as $blood)
                                                        <option value="{{$blood->id}}" {{ old('blood_id') == $blood->id ? 'selected' : '' }}>{{$blood->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('blood_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

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

                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="class_id" class="form-label">الصف</label>
                                                <select name="class_id" id="class_id" class="form-control" required>
                                                    <option value="" selected disabled>-- اختر الصف --</option>
                                                </select>
                                                @error('class_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="section_id" class="form-label">القسم</label>
                                                <select id="section_id" name="section_id" class="form-control" required>
                                                    <option value="">اختر القسم -- </option>
                                                </select>
                                                @error('section_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label for="parents_id" class="form-label">ولي الأمر</label>
                                                <select id="parents_id" name="parents_id" class="form-control" required>
                                                    <option value="">اختر ولي الأمر</option>
                                                    @foreach ($parents as $parent)
                                                        <option value="{{$parent->id}}" {{ old('parents_id') == $parent->id ? 'selected' : '' }}>{{$parent->name_father}}</option>
                                                    @endforeach
                                                </select>
                                                @error('parents_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="container mt-4">
                                            <h3 class="mb-3 text-center">المرفقات إن وجدت</h3>

                                            <div class="mb-3">
                                                <label for="photos" class="form-label">تحميل الصور</label>
                                                <input type="file" id="photos" class="form-control" name="photos[]"
                                                    multiple accept="image/*">
                                            </div>

                                        </div>


                                        <div class="text-center mt-4">
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