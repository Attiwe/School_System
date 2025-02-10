@extends('layouts.master')

@section('css')
@livewireStyles

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
<!-- breadcrumb -->
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
<!-- breadcrumb -->

<a wire:navigate class="btn btn-secondary mb-2" href="{{ route('dashboard') }}">
    <i class="bi bi-arrow-left"></i> الرجوع
</a>



<!-- massage Error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif






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

                                <div class="card card-body">
                                    <div class="accordion" id="accordionExample">
                                        <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal"
                                            data-bs-target=".bd-example-modal-lg">إضافة فصل</button>

                                        @foreach ($Grades as $Grade)
                                                <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ $Grade->id }}">
                                                    <button class="accordion-button bg-dark  text-white" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $Grade->id }}" aria-expanded="true"
                                                        aria-controls="collapse-{{ $Grade->id }}">
                                                        {{ $Grade->name }}
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ $Grade->id }}" class="accordion-collapse collapse show"
                                                    aria-labelledby="heading-{{ $Grade->id }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-striped table-hover text-center table table-hover ">
                                                                <thead class="table-primary text-center">
                                                                    <tr class="font-weight-bold">
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>#</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>اسم الفصل</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>المرحلة الدراسية</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>الفصل الدراسي</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>اسماء الدكاتره</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>اسماء المعدين</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>حالة الصف</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>الوصف</h5>
                                                                        </th>
                                                                        <th class="py-3 fw-bold fs-6">
                                                                            <h5>العمليات</h5>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($Grade->sections as $section)
                                                                                                                <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td class="text-primary">{{ $section->nameSectian }}
                                                                            </td>
                                                                            <td class="text-primary">{{ $Grade->name }}</td>
                                                                            <td>{{ $section->classRom->nameClass }}</td>
                                                                            <td>
                                                                                @if ($section->teachers->isNotEmpty())
                                                                                    @foreach ($section->teachers as $teacher)
                                                                                                                                                                              
                                                                                    <a href="{{ route('teacher.index') }}"
                                                                                            class="text-danger">
                                                                                            {{ $teacher->name }}
                                                                                        </a>
                                                                                        {{ !$loop->last ? ' _and_ ' : '  ' }}
                                                                                    @endforeach
                                                                                @else
                                                                                    <span>لا يوجد معلمون مرتبطون.</span>
                                                                                @endif
                                                                            </td>

                                                                            <td>
                                                                                @if ($section->appointments->isNotEmpty())
                                                                                    @foreach ($section->appointments as $appointment)
                                                                                                                                                                                 
                                                                                    <a href="{{ route('appointments.index') }}"
                                                                                            class="text-danger">
                                                                                            {{ $appointment->name }}
                                                                                        </a>
                                                                                        {{ !$loop->last ? ' _and_ ' : '  ' }}
                                                                                    @endforeach
                                                                                @else
                                                                                    <span>لا توجد معدين مرتبطة.</span>
                                                                                @endif
                                                                            </td>

                                                                            <td class="text-primary text-center">
                                                                                {!! $section->statuse ? '<h5>نشط</h5>' : '<h5>غير نشط</h5>' !!}
                                                                            </td>
                                                                            <td>{{ $section->desc ? $section->desc : '--' }}
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                    class="btn btn-primary btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#editModal{{ $section->id }}">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    data-toggle="modal"
                                                                                    data-target="#deleteModal{{ $section->id }}">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>

                                                                        <!-- Modal Delete -->
                                                                        <div class="modal fade"
                                                                            id="deleteModal{{ $section->id }}" tabindex="-1"
                                                                            role="dialog"
                                                                            aria-labelledby="exampleModalCenterTitle"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered"
                                                                                role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">مسح الفصل</h5>
                                                                                        <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form
                                                                                            action="{{ route('section.destroy', $section->id) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <p>هل انت متأكد من عملية الحذف؟</p>

                                                                                            <input type="hidden" name="id"
                                                                                                value="{{ $section->id }}">

                                                                                            <input class="form-control"
                                                                                                type="text" name="nameSection"
                                                                                                value="{{ $section->nameSectian }}"
                                                                                                readonly>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">إغلاق</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary">مسح</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--   model update -->
                                                                        <div class="modal fade" id="editModal{{ $section->id}}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">تعديل الفصل
                                                                                        </h5>
                                                                                        <button type="button" class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form action="{{ route('section.update') }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <input type="hidden" name="id"
                                                                                            value="{{ $section->id }}">
                                                                                        <div class="modal-body">

                                                                                            <div class="form-group">
                                                                                                <label for="nameSectian"
                                                                                                    class="control-label">اسم
                                                                                                    الفصل</label>
                                                                                                <input type="text"
                                                                                                    name="nameSectian"
                                                                                                    class="form-control"
                                                                                                    value="{{ old('nameSectian', $section->nameSectian) }}"
                                                                                                    required>
                                                                                                @error('nameSectian')
                                                                                                    <small
                                                                                                        class="text-danger">{{ $message }}</small>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label for="statuse"
                                                                                                    class="control-label">حالة
                                                                                                    الصف</label>
                                                                                                <select name="statuse"
                                                                                                    class="form-select"
                                                                                                    required>
                                                                                                    <option value="1" {{ $section->statuse == 1 ? 'selected' : '' }}>نشط
                                                                                                    </option>
                                                                                                    <option value="0" {{ $section->statuse == 0 ? 'selected' : '' }}>غير
                                                                                                        نشط</option>
                                                                                                </select>
                                                                                            </div>

                                                                                            <div class="row mb-3">
                                                                                                <div class="mb-3 col-md-6">

                                                                                                    <label for="grade_id"
                                                                                                        class="control-label">اسم
                                                                                                        المرحلة الدراسية</label>
                                                                                                    <select name="grade_id"
                                                                                                        id="grade_id"
                                                                                                        class="form-select"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="{{$Grade->id}}"
                                                                                                            selected>
                                                                                                            {{$Grade->name}}-
                                                                                                        </option>
                                                                                                        @foreach ($Grades as $grade)
                                                                                                                                                                               
                                                                                                        <option
                                                                                                                value="{{ $grade->id }}">
                                                                                                                {{ $grade->name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    @error('grade_id')
                                                                                                        <div class="text-danger">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                    @enderror
                                                                                                </div>

                                                                                                <div class="mb-3 col-md-6">
                                                                                                    <label for="class_id"
                                                                                                        class="control-label">اسم
                                                                                                        الصف</label>
                                                                                                    <select name="class_id"
                                                                                                        id="class_id"
                                                                                                        class="form-select"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="{{$section->id}}"
                                                                                                            selected>
                                                                                                            {{$section->classRom->nameClass}}
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    @error('class_id')
                                                                                                        <div class="text-danger">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>



                                                                                            <div class="row mb-3">
                                                                                                <div class="mb-3 col-md-6">
                                                                                                    <label for="teacher_id"
                                                                                                        class="control-label">القائمة
                                                                                                        الدكاتره</label>
                                                                                                    <select class="form-select"
                                                                                                        id="teacher_id"
                                                                                                        name="teacher_id[]"
                                                                                                        multiple>
                                                                                                        @foreach ($section->teachers as $teacher)
                                                                                                                                                                              
                                                                                                        <option selected
                                                                                                                value="{{$teacher['id']}}">
                                                                                                                {{$teacher['name']}}
                                                                                                            </option>
                                                                                                        @endforeach

                                                                                                        @foreach ($teachers as $teacher)
                                                                                                                                                                                
                                                                                                        <option
                                                                                                                value="{{$teacher->id}}">
                                                                                                                {{$teacher->name}}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>

                                                                                                <div class="mb-3 col-md-6">
                                                                                                    <label for="appointment_id"
                                                                                                        class="control-label">القائمة
                                                                                                        الثانية</label>
                                                                                                    <select class="form-select"
                                                                                                        id="appointment_id"
                                                                                                        name="appointment_id[]"
                                                                                                        multiple>
                                                                                                        @foreach ($appointments as $appointment)
                                                                                                                                                                             
                                                                                                        <option
                                                                                                                value="{{ $appointment->id }}"
                                                                                                                {{ in_array($appointment->id, $section->appointments->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                                                                                {{ $appointment->name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="desc">ملاحظات</label>
                                                                                                <textarea name="desc" rows="5"
                                                                                                    class="form-control"
                                                                                                    id="desc"
                                                                                                    placeholder="أضف ملاحظات">{{ old('desc', $section->desc ?? '') }}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-outline-secondary"
                                                                                                data-bs-dismiss="modal">إغلاق</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary">تحديث</button>
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
                                        @endforeach


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


<!-- Model add -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h3>إضافة فصل</h3>
                <hr>
                <form action="{{ route('section.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="mb-3 col-md-6">
                            <label for="nameSectian" class="control-label">اسم الفصل</label>
                            <input type="text" name="nameSectian" id="nameSectian" class="form-control"
                                placeholder="أدخل اسم الفصل" value="{{ old('nameSectian') }}" required>
                            @error('nameSectian')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="statuse" class="control-label">حالة الصف</label>
                            <select name="statuse" id="statuse" class="form-select" required>
                                <option value="0" {{ old('statuse') == '0' ? 'selected' : '' }}>غير نشط</option>
                                <option value="1" {{ old('statuse') == '1' ? 'selected' : '' }}>نشط</option>
                            </select>
                            @error('statuse')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="mb-3 col-md-6">
                            <label for="grade_id" class="control-label">اسم المرحلة الدراسية</label>
                            <select name="grade_id" id="grade_id" class="form-select" required>
                                <option value="" selected disabled>-- اختر المرحلة --</option>
                                @foreach ($Grades as $grade)
                                            <option value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>
                                        {{ $grade->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="class_id" class="control-label">اسم الصف</label>
                            <select name="class_id" id="class_id" class="form-select" required>
                                <option value="" selected disabled>-- اختر الصف --</option>
                            </select>
                            @error('class_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="mb-3 col-md-6">
                            <label for="teacher_id" class="control-label">القائمة الدكاتره</label>
                            <select class="form-select" id="teacher_id" name="teacher_id[]" multiple>
                                <option value="" disabled>-- اختر الدكتور --</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="appointments" class="control-label">القائمة الثانية</label>
                            <select class="form-select" id="appointment_id" name="appointment_id[]" multiple>
                                <option value="" disabled>-- اختر المعيدة --</option>
                                @foreach ($appointments as $appointment)
                                    <option value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="desc">ملاحظات</label>
                        <textarea name="desc" id="desc" rows="5" class="form-control"
                            placeholder="أدخل الملاحظات">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

@endsection

@section('js')
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ url('classes') }}/" + grade_id,
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
    });
</script>
@endsection