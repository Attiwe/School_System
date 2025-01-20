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
        <h4 class="content-title mb-0 my-auto">الصفحات</h4>
<span class="text-muted mt-1 tx-13 mr-2 mb-0">/
    <a href="{{ route('student.show') }}">
        <i class="fas fa-arrow-left"></i> الرجوع
    </a>
</span>
        </div>
    </div>
</div>



<div class="card mg-b-20" id="tabs-style2">
    <div class="card-body">
        <div class="text-wrap">
            <div class="example">
                <div class="panel panel-primary tabs-style-2">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                            الطالب</a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab"> المرفقات </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right border">
                        <div class="tab-content">


                            <div class="tab-pane active" id="tab4">
                                <div class="table-responsive mt-15">

                                    <table class="table table-striped" style="text-align:center">
                                        <tbody>
                                        <tr class="font-weight-bold" >
                           
                                          
                                            <th scope="row" > اسم الطالب</th>
                                            <td class="text-primary" >{{$student->name}}</td>
                                            <th> البريد الإلكتروني </th>
                                            <td class="text-primary" >{{$student->email}}</td>
                                            <th> السنة الدراسية</th>
                                            <td class="text-danger" >{{$student->academic_year}}</td> 

                                        </tr>

                                        <tr class="font-weight-bold">
                                        <th>  تاريخ الميلاد </th>
                                        <td class="text-primary" >{{$student->date_birth}}</td>
                                        <th>  فصيلة الدم</th>
                                        <td class="text-primary" >{{$student->bloodStudent->name}}</td>
                                        <th> النوع</th>
                                        <td class="text-primary" >{{$student->gender}}</td>
                                        </tr>
                                        
                                        <tr class="font-weight-bold">
                                            <th>المرحلة الدراسية</th>
                                            <td class="text-success" >{{$student->gradeStudent->name}}</td>
                                            <th> الصف الدرسي</th>
                                            <td class="text-success" >{{$student->classStudent->nameClass}}</td>
                                            <th>القاعه الراسيه</th>
                                            <td class="text-success" >{{$student->sectionStudent->nameSectian }}</td>

                                        </tr>

                                        <tr class="font-weight-bold" >
                                            <th> ولي الأمر</th>
                                            <td class="text-primary" >{{$student->parentsStudent->name_father}}</td>
                                            <th>الدولة</th>
                                            <td class="text-primary" >{{$student->nationalitieStudent->name}}</td>
                                         </tr>
                                        <tr class="font-weight-bold" >
                                            <th>  تم إنشاؤه في </th>
                                            <td class="text-danger" >{{$student->created_at  }}</td>
                                            <th>تم التحديث في   </th>
                                            <td class="text-danger" >{{$student->updated_at}}</td>
                                         </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="tab-pane" id="tab5">
                            <div class="table-responsive mt-4">
                            <form action="{{ route('student.uploade_attachment') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card p-4 shadow-sm">
                                        <h3 class="mb-4 text-center">إضافة مرفقات</h3>
                                        <div class="mb-3">
                                            <input type="hidden" id="name" name="name" class="form-control" value="{{ $student->name }}">
                                            <input type="hidden" id="student_id" name="student_id" class="form-control" value="{{ $student->id }}">
                                            <label for="photos" class="form-label">تحميل الصور</label>
                                            <input type="file" id="photos" class="form-control" name="photos[]" multiple accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-primary">رفع الصور</button>
                                    </div>
                                </form>


                                <h4 class="mt-5 mb-3 text-center">قائمة المرفقات</h4>
                                <table class="table text-md-nowrap table-bordered table-hover">
                                    <thead class="table-info text-center">
                                        <tr  >
                                            <th> <h4> اسم الملف </h4> </th>
                                            <th > <h4>تاريخ  الإنشاء </h4> </th>
                                            <th>  <h4>تاريخ التحديث </h4>  </th> 
                                            <th> <h4>العمليات</h4> </th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($student->images as $image)
                                        <tr class="font-weight-bold" >
                                            <td class="text-primary text-center" >{{$image->fileName}}</td>
                                            <td class="text-danger text-center">{{$image->created_at}}</td>
                                            <td class="text-danger text-center">{{$image->updated_at}}</td>
                                             <td class="text-center">
                                            
                                            <a class="btn btn-outline-primary btn-sm"
                                                           href="{{url('student/download_attachment')}}/{{ $image->imageable->name }}/{{$image->fileName}}"
                                                           role="button"><i class="fas fa-download"></i>&nbsp;تحميل </a>

                                         <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">حذف</button>

                                                 <button class="btn btn-sm btn-outline-secondary">عرض</button>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle"> عمليه الحذف </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{route('student.destroy_attachment')}}"  method="POSt" >
                                             @csrf
                                             @method('DELETE')
                                             <h4>هل انت متأكد من عملية الحذف ؟<h4/>

													<input type="hidden" name="id"  value="{{$image->imageable->id}}">
													<input type="hidden" name="id"  value="{{$image->id}}">
  													<input class="form-control" name="student_name" type="text" 
                                                     value="{{$image->imageable->name}}"  >
  													<input class="form-control" name="fileName" type="hidden" 
                                                     value="{{$image->fileName}}"  >
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">الاغلاق</button>
                                                   <button type="submit" class="btn btn-primary">  المسح
                                                 </button>
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
@endsection