@extends('layouts.master')

@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                <h2><i class="fa-brands fa-paypal"></i> سندات صرف <span
                        class="text-danger">{{ $payment->student->name }}</span>
                </h2>
            </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                / <a href="{{ route('paymentStudnet.index') }}"><i class="fas fa-arrow-left"></i> الرجوع</a>
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
                <p class="tx-12 tx-gray-500 mb-2"> سندات صرف للطالب <a href="#">تعرف على المزيد</a></p>
                <div class="text-center mb-4">
                    <h3> سند للطالب <span class="text-primary">{{$payment->student->name}}</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('paymentStudnet.update',$payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="student_id" value="{{ $payment->id }}">

                    <div class="row">
                        <div class="col-12 col-md-12 mb-3">
                            <label for="amount" class="form-label"><strong>مبلغ الصرف للطالب:</strong></label>
                            <input type="number" id="amount" name="amount" class="form-control"
                                value="{{ old('amount', $payment->amount) }}">
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label for="desc" class="form-label"><strong>البيان:</strong></label>
                            <textarea name="desc" rows="5" class="form-control"
                                id="desc">{{ old('desc', $payment->desc) }}</textarea>
                            @error('desc')
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