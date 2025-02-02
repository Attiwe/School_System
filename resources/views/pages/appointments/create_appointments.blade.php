@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">صفحات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                فارغة</span>
        </div>
    </div>
</div>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>يرجى تصحيح الأخطاء التالية:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a wire:navigate class="btn btn-danger mb-3" href="{{ route('appointments.index') }}">
    <i class="bi bi-arrow-left"></i> الرجوع
</a>





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
                                <div class=" ">
                                    <h2 class="mb-4">معلومات المعيد</h2>
                                    <form method="POST" action="{{route('appointments.store')}} ">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">الاسم <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name') }}" placeholder="أدخل اسمك">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">البريد الإلكتروني <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ old('email') }}" placeholder="أدخل بريدك الإلكتروني">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="mb-3 col-md-6">
                                                <label for="Specialization_id">التخصص <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select" name="Specialization_id">
                                                    <option value="" disabled {{ old('Specialization_id') ? '' : 'selected' }}>اختر التخصص</option>
                                                    @foreach ($specialization as $spe)
                                                        <option value="{{ $spe->id }}" {{ old('Specialization_id') == $spe->id ? 'selected' : '' }}>
                                                            {{ $spe->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('Specialization_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>




                                            <div class="mb-3 col-md-3">
                                                <label for="phone" class="form-label">رقم الهاتف</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ old('phone') }}" placeholder="أدخل رقم الهاتف">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-3">
                                                <label for="joining_date" class="form-label">تاريخ الانضمام</label>
                                                <input type="date" class="form-control" id="joining_date"
                                                    name="joining_date" value="{{ old('joining_date') }}">
                                                @error('joining_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mb-3">
                                            <label for="address" class="form-label">العنوان</label>
                                            <textarea class="form-control" id="address" name="address"
                                                placeholder="أدخل عنوانك" rows="4">{{ old('address') }}</textarea>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-4 ">تأكيد</button>
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











@endsection

@section('js')
@endsection