@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="container mt-5">
    @foreach ($teachers as $teacher)
        <div class="card card-body p-4 mb-4">
            <h2 class="mb-4">معلومات الدكتور</h2>
            <form method="POST" action="{{ route('teacher.update', $teacher->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                            value="{{ old('name', $teacher->name) }}" placeholder="أدخل اسمك">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            value="{{ old('email', $teacher->email) }}" placeholder="أدخل بريدك الإلكتروني">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                            placeholder="اترك الحقل فارغاً إذا كنت لا تريد التغيير">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="phone" class="form-label">رقم التلفون</label>
                        <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                            value="{{ old('phone', $teacher->phone) }}" placeholder="أدخل رقم التلفون">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="joining_date" class="form-label">تاريخ الانضمام</label>
                        <input type="date" class="form-control form-control-lg" id="joining_date" name="joining_date"
                            value="{{ old('joining_date', $teacher->joining_Date ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Specialization_id">التخصص</label>
                        <select class="form-control form-control-lg" id="Specialization_id" name="Specialization_id">
                            @foreach($specializations as $specialization)
                                <option value="{{ $specialization->id }}" 
                                    {{ old('Specialization_id', $teacher->specialization_id) == $specialization->id ? 'selected' : '' }}>
                                    {{ $specialization->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">الجنس</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="Gender" id="genderMale" value="male" 
                                    {{ old('Gender', $teacher->gender) === 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="genderFemale" value="female" 
                                    {{ old('Gender', $teacher->gender) === 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">العنوان</label>
                    <textarea class="form-control form-control-lg" id="address" name="address" rows="5"
                        placeholder="أدخل عنوانك">{{ old('address', $teacher->address) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">تأكيد</button>
            </form>
        </div>
    @endforeach
</div>
@endsection

@section('js')
@endsection
