@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                <h3> <i class="fa-solid fa-receipt" >  عرض  السندات    </i></h3>
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="{{route('student.show')}}">الرجوع</a></span>
        </div>
    </div>
</div>
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


<div class="row row-sm  ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap table table-hover " id="example1">
                        <thead class=" table-secondary  ">
                            <tr class="font-weight-bold">
                                <th>#</th>
                                
                                <th>
                                    <h5> اسم الطالب </h5>
                                </th>
                                <th>
                                    <h5> المبلغ </h5>
                                </th>
                                <th>
                                    <h5> البيان </h5>
                                </th>
                                <th>
                                    <h5> التاريخ </h5>
                                </th>
                                <th>
 
                                    <h5> تم إنشاؤه في
                                    </h5>
                                </th>
                                <th>
                                    <h5> تم التحديث في
                                    </h5>
                                </th>
                                <th>
                                     <h5> العمليات </h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                            <tr class="  font-weight-bold">
                                <td>  {{$loop->iteration}} </td>
                                <td class="text-primary" >  {{optional($receipt->student)->name ?: ' تم حذفه'}} </td>
                                <td class="text-danger" >  {{$receipt->debit}} جنيه </td>
                                <td class="text-primary" >  {{$receipt->desc}} </td>
                                <td class="text-primary">  {{$receipt->date}} </td>
                                
                                 <td class="text-primary">  {{$receipt->created_at}} </td>
                                <td class="text-primary">  {{$receipt->updated_at}} </td>
                                <td>  
                                <a  href="{{route('receipt.edit',$receipt->id)}}"  class="btn btn-sm btn-primary"> <strong> التعديل </strong> </a>
                                  <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$receipt->id}}">
                                <strong> الحذف </strong> </button>
                                </td>
                             </tr>
                               <!-- Modal Delete -->
                              @include('pages.ReceiptStudent.delete_receiptStudnet')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- row -->
<div class="row">

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection