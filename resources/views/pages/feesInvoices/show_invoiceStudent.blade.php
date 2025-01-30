@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h3> <i class="fa-solid fa-calculator text-secondary"> فاتورة الرسوم الدراسيه </i></h3>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{route('student.show')}} ">الرجوع</a>
            </span>
        </div>
    </div>
</div>
<h6 class="text-danger">الصفحة تحتوي على تحديث <span class="text-dark">repeater</span></h6>

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
@endsection

@section('content')
<div class="row row-sm">

    <div class="col-xl-12">

        <a href="{{route('feesInvoice.index')}} " class="btn   btn-outline-primary"> <i class="fa-solid fa-file-lines">
                قائمه الفوتير </i></a>

        <div class="card mt-5">
            <div class="card-header pb-0">
                <p class="tx-12 tx-gray-500 mb-2">ترقية الطلاب <a href="#">تعرف على المزيد</a></p>
            </div>
            <div class="card-body">
                <form action="{{ route('feesInvoice.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-12 col-md-6 mb-3">
                            <label for="name" class="form-label">الطالب</label>
                            <select id="name" name="name" class="form-control text-danger">
                                <option value="{{ $student->id }}"> {{ $student->name }}</option>
                            </select>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="fee_title" class="form-label">اسم الرسوم</label>
                            <select id="fee_title" name="fee_title" class="form-control text-danger">
                           
                                
                                <option value="{{$fees->id}} ">{{ $fees->title }}</option>
                         
                            </select>
                            @error('fee_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="grade" class="form-label">رسوم المرحلة الدراسية</label>
                            <select id="grade" name="grade" class="form-control text-danger">
                                <option value="{{ $fees->grade->id }}">{{ $fees->grade->name }}</option>
                            </select>
                            @error('grade')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="class_title" class="form-label">رسوم الصف الدراسي</label>
                            <select id="class_title" name="class_title" class="form-control text-danger">
                                <option value="{{ $fees->class->id }}">{{ $fees->class->nameClass }}</option>
                            </select>
                            @error('class_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="amount" class="form-label">المبلغ</label>
                            <select name="amount" id="amount" class="form-control text-danger">
                                <option value="{{ $fees->amount }}">{{ $fees->amount }}</option>
                            </select>
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
@endsection

@section('js')

@endsection