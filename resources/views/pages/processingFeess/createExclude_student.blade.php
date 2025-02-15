@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto  ">
                <h2><i class="fa-solid fa-user-tie"> استبعاد طالب </i> <span
                        class="text-danger">{{ $student->name }}</span> </h2>
            </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{ route('processfees.index') }}">
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

                    <p class="tx-12 tx-gray-500 mb-2"> استبعاد الطالب <span
                            class="text-danger">{{ $student->name }}</span> <a href="#">تعرف على المزيد</a></p>
                    <div class=" text-center mb-4">
                        <h3> استبعاد الطالب <span class="text-danger">{{ $student->name }}</span> </h3>
                    </div>

                    <div class="row card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-body">
                                    <form action="{{route('processfees.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                <label> المبلغ : </label>
                                                <input type="number" id="amount" name="amount" class="form-control"
                                                    value="{{ old('amount') }}" required>
                                                @error('amount')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3 mb-3">
                                                <label>المبلغ الكل الطالب : </label>
                                                <input class="form-control text-danger" name="final_balance"
                                                    value="{{$student->student_account->first()->debit }}" type="text"
                                                    readonly>
                                                @error('student_balance')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-3 mb-3">
                                                <label>المبلغ المتبقي علي الطالب : </label>
                                                <input class="form-control text-danger " name="final_balance"
                                                    value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}"
                                                    type="text" readonly>
                                                @error('student_balance')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-12 mb-3">
                                                <label> البيان : </label>
                                                <textarea name="desc"
                                                    class="form-control text-primary ">تم استبعاد الطالب {{ $student->name }}</textarea>
                                                @error('desc')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary"> استبعاد </button>
                                            </div>
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