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
            <h4 class="content-title  mb-0 my-auto">
                <h3> <i class="fa-solid fa-file-invoice-dollar text-primary "> الفوتير </i></h3>
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="">الرجوع</a></span>
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
                                    <h5>اسم الطالب </h5>
                                </th>

                                <th>
                                    <h5> المرحلة الدراسية </h5>
                                </th>
                                <th>
                                    <h5> الصف الدراسي </h5>
                                </th>
                                <th>
                                    <h5>اسم الرسوم </h5>
                                </th>
                                <th>
                                    <h5> المصاريف </h5>
                                </th>
                                <th>
                                    <h5> السنة الدراسية </h5>
                                </th>
                                <th>
                                    <h5> تاريخ الدفع </h5>
                                </th>
                                <th>
                                    <h5> الملاحظات </h5>
                                </th>
                                <th>
                                    <h5> العمليات </h5>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feesInvoice as $fees)
                                <tr class="  font-weight-bold">
                                    <td> {{$loop->iteration}}</td>
                                    <td class="  text-center text-primary"> {{ optional( $fees->student ) ->name ?: 'تم خذفه' }} </td>
                                    <td class="  text-center text-primary"> {{$fees->grade->name}} </td>
                                    <td class=" text-center text-primary"> {{  $fees->class->nameClass}} </td>
                                    <td class=" text-center text-success"> {{ optional( $fees->fees )->title ?: 'تم  حذف الفتوره' }} </td>
                                    <td class=" text-center text-danger"> {{$fees->amount}} </td>
                                    <td class=" text-center text-success "> {{$fees->fees->year}} </td>
                                    <td class=" text-center text-danger "> {{$fees->invoice_date}} </td>
                                    <td class=" text-center text-primary "> {{$fees->desc ?? 'لاتوجد ملاحظات'}} </td>
                                    <td class=" text-center text-primary">
                                        <button type="button" class="btn btn-sm  btn-danger" data-toggle="modal"
                                            data-target="#exampleModalCenter{{$fees->id}}"> الحذف </button>
                                    </td>
                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModalCenter{{$fees->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"> عملية الحذف </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('feesInvoice.destroy', $fees->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                                                    <input type="hidden" name="id" value="{{$fees->id}}" id="id">
                                                    <input class="form-control" name="name" value=" {{ optional( $fees->student ) ->name ?: 'تم خذفه' }} "
                                                        type="text" readonly>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                            اغلاق </button>
                                                        <button type="submit" class="btn btn-danger"> حذف </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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