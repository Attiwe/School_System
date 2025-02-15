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
                <h3> <i class="fa-solid fa-layer-group text-info ">  أسئلة </i></h3>
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{route('question.index')}}">الرجوع</a></span>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mt-5">
                <div class="col-xl-12">
                    <div class="card-header pb-0">
                        <p class="tx-12 tx-gray-500 mb-2"> أسئلة <a href="#">تعرف على المزيد</a></p>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action=" {{route('question.update','test')}} " method="POST" autocomplete="off">
                                    @csrf
                                     @method('PUT')
                                    <div class="row">
                                        <div class="col-12 col-md-12 mb-3">
                                            <input type="hidden" name="id" value="{{ $Question->id }}" >
                                            <label for="title" class="form-label fw-bold fs-5">📝 السؤال</label>
                                            <textarea name="title" id="title"
                                                class="form-control rounded-3 p-3 shadow-sm fs-5"
                                                placeholder="اكتب سؤالك هنا..." rows="5"
                                                required>{{ old('title',$Question->title) }}</textarea>

                                            @error('title')
                                                <small class="text-danger d-block mt-2 fs-6">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="answer" class="form-label fw-bold fs-5">📝 الاجابه</label>
                                            <textarea name="answer" id="answer"
                                                class="form-control rounded-3 p-3 shadow-sm fs-5"
                                                placeholder="اكتب الاجابه هنا..." rows="5"
                                                required>{{ old('answer',$Question->answer) }}</textarea>

                                            @error('answer')
                                                <small class="text-danger d-block mt-2 fs-6">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 mb-3">
                                            <label for="right_answer" class="form-label fw-bold fs-5">📝 الإجابة الصحيحة
                                            </label>
                                            <textarea name="right_answer" id="right_answer"
                                                class="form-control rounded-2 p-3 shadow-sm fs-5"
                                                placeholder=" الإجابة الصحيحة   .." rows="5"
                                                required>{{ old('right_answer',$Question->right_answer) }}</textarea>

                                            @error('right_answer')
                                                <small class="text-danger d-block mt-2 fs-6">{{ $message }}</small>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="quizze_id" class="form-label">قائمة الاختبارات</label>
                                            <select id="quizze_id" name="quizze_id" class="form-control" required>
                                                 <option value=" {{ $Question->quizze_id }}"> {{ $Question->quizze->nameQuizze }} </option>
                                                @foreach ($quizzes as $quiz)
                                                    <option value="{{ $quiz->id }}" {{ old('quizze_id') == $quiz->id ? 'selected' : '' }}>
                                                        {{ $quiz->nameQuizze }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('quizze_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="score" class="form-label">الدرجات</label>
                                            <input type="number" name="score" id="score" class="form-control"
                                                value="{{ old('score',$Question->score) }}" required min="0">
                                            @error('score')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 mt-4">
                                        <button type="submit" class="btn btn-primary"> حفظ البيانات </button>
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