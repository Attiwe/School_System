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



<div class="row row-sm">  
         <div class="col-xl-12">
         <div class="d-flex align-items-center justify-content-between mb-3">
    
            </div>
            <div class="card mt-5">
                
                <div class="col-xl-12">
                    <div class="card-header pb-0">
                        
                        <p class="tx-12 tx-gray-500 mb-2">   ترقيه الطلاب  <a href="#">تعرف على المزيد</a></p>

                        <div class="row card">
                            <div class="card-body">
                                <div class="table-responsive">
 
                                     <div>
                                        @foreach ($appointments as $appointment)
                                            <div class="card card-body p-4 mb-4">
                                                <h2 class="mb-4">معلومات المعيد </h2>
                                        
                                                <form method="POST" action="{{route('appointments.update',$appointment->id)}}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="name" class="form-label">الاسم</label>
                                                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                                                value="{{ old('name', $appointment->name) }}" placeholder="أدخل اسمك">
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="email" class="form-label">البريد الإلكتروني</label>
                                                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                                                value="{{ old('email', $appointment->email) }}" placeholder="أدخل بريدك الإلكتروني">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                            <label for="Specialization_id">التخصص</label>
                                                            <select class="form-control form-control-lg" id="Specialization_id" name="Specialization_id">
                                                                @foreach($specializations as $specialization)
                                                                    <option value="{{ $specialization->id }}" 
                                                                        {{ old('Specialization_id', $appointment->specialization_id) == $specialization->id ? 'selected' : '' }}>
                                                                        {{ $specialization->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="phone" class="form-label">رقم التلفون</label>
                                                            <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                                                                value="{{ old('phone', $appointment->phone) }}" placeholder="أدخل رقم التلفون">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label for="joining_date" class="form-label">تاريخ الانضمام</label>
                                                            <input type="date" class="form-control form-control-lg" id="joining_date" name="joining_date"
                                                                value="{{ old('joining_date', $appointment->joining_Date ?? '') }}">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="address" class="form-label">العنوان</label>
                                                        <textarea class="form-control form-control-lg" id="address" name="address" rows="5"
                                                            placeholder="أدخل عنوانك">{{ old('address', $appointment->address) }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-lg">تأكيد</button>
                                                </form>
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
        
@endsection

@section('content')
 
@endsection

@section('js')
@endsection
