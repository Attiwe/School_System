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
                <h3> <i class="fa-solid fa-calculator text-secondary "> اضافه الرسوم الدراسيه </i></h3>
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <a href="">الرجوع</a></span>
        </div>
    </div>
</div>
  


<div class="row row-sm  ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="{{ route('fees.create') }}" class="btn btn-primary mb-3">
                    <i class="fa-solid fa-calculator"></i> اضافه الرسوم الدراسيه
                </a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap table table-hover " id="example1">
                        <thead class=" table-secondary  ">
                            <tr class="font-weight-bold">


                                <th>#</th>
                                <th>
                                    <h5>اسم الرسوم </h5>
                                </th>
                                <th>
                                    <h5> المرحلة الدراسية </h5>
                                </th>
                                <th>
                                    <h5> الصف الدراسي </h5>
                                </th>
                                <th>
                                    <h5> المصاريف </h5>
                                </th>
                                <th>
                                    <h5> السنة الدراسية </h5>
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
                            @foreach ($feess as $fees)
                                <tr class="  font-weight-bold">
                                    <td> {{$loop->iteration}}</td>
                                    <td class="  text-center text-dark"> {{$fees->title}} </td>
                                    <td class="  text-center text-primary"> {{$fees->grade->name}} </td>
                                    <td class=" text-center text-dark"> {{$fees->class->nameClass}} </td>
                                    <td class=" text-center text-danger"> {{$fees->amount}} </td>
                                    <td class=" text-center text-dark"> {{$fees->year}} </td>
                                    <td class=" text-center"> {{$fees->desc}} </td>
                                    <td class=" text-center text-primary">

                                        <a href="{{ route('fees.edit', $fees->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i> التعديل
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#exampleModal{{$fees->id}}">
                                            <i class="fa-solid fa-trash"></i> الحذف
                                        </button>

                                        <a href="{{ route('fees.show', $fees->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa-regular fa-eye"></i> العرض
                                        </a>


                                    </td>

                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModal{{$fees->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> عمليه الحذف </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('fees.destroy', $fees->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                                                    <input type="hidden" name="id" value="{{$fees->id}}" id="id">
                                                    <input class="form-control" name="name" value="{{$fees->title}}"
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