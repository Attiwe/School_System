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
                        class="text-danger">{{ $procesingFees->student->name }}</span> </h2>
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
                            class="text-danger">{{ $procesingFees->student->name }}</span> <a href="#">تعرف على
                            المزيد</a></p>
                    <div class=" text-center mb-4">
                        <h3> استبعاد الطالب <span class="text-danger">{{ $procesingFees->student->name }}</span> </h3>
                    </div>

                    <div class="row card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <div class="card-body">
                                    <form action="{{ route('processfees.update', $procesingFees->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $procesingFees->id }}">
                                        <input type="hidden" id="student_id" name="student_id"
                                            value="{{ $procesingFees->student_id }}">

                                        <div class="row">
                                          
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>المبلغ :</label>
                                                <input type="number" id="amount" name="amount" class="form-control"
                                                    value="{{ old('amount', $procesingFees->amount) }}" required>
                                                @error('amount')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                           
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>التاريخ :</label>
                                                <input type="text" class="form-control text-danger" name="date" readonly
                                                    value="{{ old('date', $procesingFees->date) }}">
                                                @error('date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                       
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label>البيان :</label>
                                                <textarea name="desc"
                                                    class="form-control text-primary">{{ $procesingFees->desc }}</textarea>
                                                @error('desc')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary">تعديل استبعاد</button>
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