 @extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- إضافة Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                Empty</span>
        </div>
    </div>
</div>

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card mt-5">
            <div class="card-header pb-0">
                <p class="tx-12 tx-gray-500 mb-2">ترقيه الطلاب <a href="#">تعرف على المزيد</a></p>
                <div class=" mt-3 mb-3" >
                <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#exampleModal">  ترجع  الكل   </button>
                </div>
                <div class="table-responsive"> 
                    <table class="table text-md-nowrap table-secondary table table-hover" id="example1">
                        <thead class="table-info text-center">
                            <tr class="font-weight-bold">
                                <th><h6>#</h6></th>
                                <th class="alert-success"><h6>اسم الطالب</h6></th>
                                <th><h6>المرحلة الدراسية</h6></th>
                                <th class="alert-success"><h6>المرحلة الدراسية المنقول إليها</h6></th>
                                <th><h6>الصف الدراسي</h6></th>
                                <th class="alert-success"><h6>الصف الدراسي المنقول إليها</h6></th>
                                <th><h6>الأقسام الدراسية</h6></th>
                                <th class="alert-success"><h6>الأقسام الدراسية المنقول إليها</h6></th>
                                <th><h6>العام الدراسي</h6></th>
                                <th class="alert-success"><h6>العام الدراسي المنقول إليها</h6></th>
                                <th class="alert-success"><h6>   العمليات  </h6></th>
                            </tr>
                        </thead>
                        <tbody class="table-info text-center">
                            @foreach ($promotions as $promotion)
                                <tr class="font-weight-bold">
                                    <td class="text-info">{{$loop->iteration}}</td>
                                    <td class="text-secondary">{{$promotion->student->name}}</td>
                                    <td class="text-primary">{{$promotion->fromGrade->name}}</td>
                                    <td class="text-danger">{{$promotion->toGrade->name}}</td>
                                    <td class="text-primary">{{$promotion->fromClass->nameClass}}</td>
                                    <td class="text-danger">{{$promotion->toClass->nameClass}}</td>
                                    <td class="text-primary">{{$promotion->fromSectian->nameSectian}}</td>
                                    <td class="text-danger">{{$promotion->toSectian->nameSectian}}</td>
                                    <td class="text-primary">{{$promotion->academic_year}}</td>
                                    <td class="text-danger">{{$promotion->new_academic_year}}</td>
                                    <td > 
                                   
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$promotion->student_id}}">
                                    <i class="  fas fa-arrow-rotate-left"></i></button>

                                    </td>
                                </tr>


                                                                
                                <!-- Modal   الترجع  -->
                                <div class="modal fade" id="exampleModalCenter{{$promotion->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">  عملية الترجع   </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('promotion.destroy')}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <h3>هل انت متاكد من عملية الترجع ؟</h3><br>

                                    <input type="hidden" name="id" value="{{$promotion->student_id}}"   >
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"> الاغلاق </button>
                                    <button type="submit" class="btn btn-danger">  التاكيد </button>
                                </div>
                                    </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End of table-responsive -->
            </div>
        </div>
    </div>
</div>


<!-- Modal  ترجع  الكل  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">  ترجع  الكل  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{route('promotion.destroy')}}" method="POST" >
           @csrf
           @method('DELETE')
           <h3>هل انت متاكد من عملية الترجع ؟</h3><br>

           <input type="hidden" name="number" value="1" >
           <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"> الاغلاق </button>
        <button type="submit" class="btn btn-danger">  التاكيد </button>
      </div>
         </form>
      </div>
       
    </div>
  </div>
</div>

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
