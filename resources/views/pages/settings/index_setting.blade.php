@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
@section('title')
    الاعدادات
    @stop
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto  ">
                    <i class="fa-solid fa-gears fw-bolder text-primary "> الاعدادات </i></h2>
                </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <a href="{{ route('setting.index') }}">
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

                        <p class="tx-12 tx-gray-500 mb-2"> الاعدادات <a href="#">تعرف على المزيد</a></p>
                        <div class=" text-center mb-4">

                        </div>

                        <div class="row card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card-body">
                                        <form action="{{ route('setting.update', 'test') }}" method="POST" autocomplete="off"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="school_name" class="me-2 "> <strong
                                                                class="text-primary">الاسم : </strong> </label>
                                                        <input type="text" id="school_name" name="school_name"
                                                            class="form-control w-50"
                                                            value="{{ old('school_name', $settings['school_name']) }}"
                                                            required>
                                                    </div>
                                                    @error('school_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="current_session" class="me-2 pl-3"> <strong
                                                                class="text-primary"> العام الحالي : </strong> </label>
                                                        <input type="text" id="current_session" name="current_session"
                                                            class="form-control w-50"
                                                            value="{{ old('current_session', $settings['current_session']) }}"
                                                            required>
                                                    </div>
                                                    @error('current_session')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="school_title" class="me-2 pl-3"> <strong
                                                                class="text-primary">الاسم المختصر : </strong> </label>
                                                        <input type="text" id="school_title" name="school_title"
                                                            class="form-control w-50"
                                                            value="{{ old('school_title', $settings['school_title']) }}"
                                                            required>
                                                    </div>
                                                    @error('school_title')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="phone" class="me-2 pl-3"> <strong
                                                                class="text-primary">الهاتف : </strong> </label>
                                                        <input type="text" id="phone" name="phone" class="form-control w-50"
                                                            value="{{ old('phone', $settings['phone']) }}" required>
                                                    </div>
                                                    @error('phone')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="school_email" class="me-2 pl-3"> <strong
                                                                class="text-primary">البريد الالكتروني : </strong> </label>
                                                        <input type="text" id="school_email" name="school_email"
                                                            class="form-control w-50"
                                                            value="{{ old('school_email', $settings['school_email']) }}"
                                                            required>
                                                    </div>
                                                    @error('school_email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="address" class="me-2 pl-3"> <strong
                                                                class="text-primary">العنوان : </strong> </label>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control w-50"
                                                            value="{{ old('address', $settings['address']) }}" required>
                                                    </div>
                                                    @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="end_second_term" class="me-2 pl-3"> <strong
                                                                class="text-primary">نهاية الترم الأول : </strong> </label>
                                                        <input type="text" id="end_second_term" name="end_second_term"
                                                            class="form-control w-50"
                                                            value="{{ old('end_second_term', $settings['end_second_term']) }}"
                                                            required>
                                                    </div>
                                                    @error('end_second_term')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="end_first_term" class="me-2 pl-3"> <strong
                                                                class="text-primary">نهاية الترم الثاني : </strong> </label>
                                                        <input type="text" id="end_first_term" name="end_first_term"
                                                            class="form-control w-50"
                                                            value="{{ old('end_first_term', $settings['end_first_term']) }}"
                                                            required>
                                                    </div>
                                                    @error('end_first_term')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-12 mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="logo" class="me-2 pl-3"><strong
                                                                class="text-primary">الشعار :</strong></label>
                                                        <div class="mb-3">
                                                            <img style="width: 100px" height="100px"
                                                                src="{{ asset('storage/' . $settings['logo']) }}"
                                                                alt="Logo">
                                                        </div>
                                                        <input name="logo" accept="image/*" type="file" class="file-input"
                                                            data-show-caption="false" data-show-upload="false" data-fouc>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">تأكيد</button>
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

@endsection