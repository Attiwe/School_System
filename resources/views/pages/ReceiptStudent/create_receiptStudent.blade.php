@extends('layouts.master')

@section('css')
<!-- إضافة أي أنماط CSS إضافية هنا -->
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                <h2><i class="fa-solid fa-receipt"></i> إضافة سند قبض <span
                        class="text-danger">{{ $student->name }}</span></h2>
            </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                / <a href="{{ route('student.show') }}"><i class="fas fa-arrow-left"></i> الرجوع</a>
            </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card mt-5">
            <div class="card-header pb-0">
                <p class="tx-12 tx-gray-500 mb-2">إضافة سند للطالب <a href="#">تعرف على المزيد</a></p>
                <div class="text-center mb-4">
                    <h3>إضافة سند للطالب <span class="text-primary">{{ $student->name }}</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('receipt.store')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-12 col-md-12 mb-3">
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <label for="debit" class="form-label"> <strong>المبلغ</strong> </label>
                            <input type="number" id="debit" name="debit" class="form-control" value="{{ old('debit') }}"
                                required autocomplete="off">
                            @error('debit')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12 col-md-12 mb-3">
                            <label for="notes" class="form-label"> <strong>البيان</strong> </label>
                            <textarea name="notes" rows="5" class="form-control"
                                id="notes">{{ old('notes') }}</textarea>
                            @error('notes')
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
<!-- إضافة أي scripts إضافية هنا -->
@endsection