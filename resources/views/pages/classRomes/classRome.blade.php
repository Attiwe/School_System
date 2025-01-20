@extends('layouts.master')
@section('css')

<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
@livewireStyles
@endsection

@section('page-header')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">الصفحات</h4>
<span class="text-muted mt-1 tx-13 mr-2 mb-0">/
    <a href="{{ route('dashboard') }}">
        <i class="fas fa-arrow-left"></i> الرجوع
    </a>
</span>

        </div>
    </div>
</div>
<!-- breadcrumb -->

  <!-- return -->
<button  wire:navigate  class="btn btn-secondary mb-2"  href='{{ route('page.index') }}'">  <i class="bi bi-arrow-left"></i> الرجوع</button>

<!-- button add -->
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add">
    اصافة الصف الدرسي
</button>

<!-- button Delete -->
<button class="btn btn-danger mb-2" type="button" id="btn_delete_all">حذف الكل</button>
        <!-- filter -->
       <form action="{{ route('class.filter') }}" method="GET">
    @csrf
    <select name="grade_id" class="selectpicker" data-style="btn-info" onchange="this.form.submit()">
        <option value="" selected disabled class="btn btn-danger mt-2" >-- المرحله الدراسيه --</option>
        @foreach ($grades as $id=>$name)
            <option value="{{ $id}}">{{ $name }}</option>
        @endforeach
    </select>
</form>


<div class="col-xl-12 card-body">
    <!-- massage error query -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    


<div class="row row-sm">  
         <div class="col-xl-12">
         <div class="d-flex align-items-center justify-content-between mb-3">
    
            </div>
            <div class="card mt-5">
                
                <div class="col-xl-12">
                    <div class="card-header pb-0">
                        
                        <p class="tx-12 tx-gray-500 mb-2">   عرض الصفوف الدراسية مع المرحلة الدراسية. <a href="#">تعرف على المزيد</a></p>

                        <div class="row card">
                            <div class="card-body">
                                <div class="table-responsive">
 
  <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th><input type="checkbox" name="select_all" id="example-select-all "
                                    onclick="CheckAll('box1', this)"></th>
                            <th class="py-3 fw-bold fs-6">#</th>
                            <th class="py-3 fw-bold fs-6">المرحلة الدراسية</th>
                            <th class="py-3 fw-bold fs-6">الصف الدراسي</th>
                            <th class="py-3 fw-bold fs-6">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                       <!-- @php      $list = isset($details) ? $details : $class;  @endphp -->
                        @foreach ($class as $clas)
                            <tr class="text-danger" >
                                <td><input type="checkbox" value="{{$clas->id}}" class="box1"></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $clas->grade->name }}</td>
                                <td>{{ $clas->nameClass }}</td>
                                <td>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal{{$clas->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>


                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $clas->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </td>
                            </tr>

                            <!-- Modal الحذف -->
                            <div class="modal fade" id="deleteModal{{ $clas->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel{{ $clas->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header  text-white">
                                            <h5 class="modal-title">تأكيد الحذف</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>هل أنت متأكد من حذف هذا الصف الدراسي؟</h4>
                                            <input class="form-control" name="nameClass" value="{{ $clas->nameClass }}"
                                                type="text" readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('class.destroy', $clas->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">تأكيد المسح</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">إغلاق</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal update -->
                            <div class="modal fade" id="editModal{{$clas->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">الصفوف الدراسية</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('class.update', $clas->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="title">اسم الفصل الدراسي</label>
                                                    <input type="hidden" name="id" value="{{ $clas->id }}" >
                                                    <input type="text" name="nameClass" value="{{ $clas->nameClass }}  "
                                                        class="form-control" id="title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="my-1 mr-2" for="grade_id">القسم</label>
                                                    <select name="grade_id" id="grade_id" class="form-control" required>
                                                        <option value="{{ $clas->grade->id }}" selected>
                                                            {{ $clas->grade->name }}
                                                        </option>
                                                        @foreach ($grades as $id => $name)
                                                            <option value="{{ $id }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">تأكيد</button>
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">إغلاق</button>
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
</div>
        
















<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة صف دراسي</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('class.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">اسم الفصل الدراسي</label>
                        <input type="text" name="nameClass" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                        <select name="grade_id" id="grade_id" class="form-control" required>
                            <option value="" selected disabled>-- حدد القسم --</option>
                            @foreach ($grades as $id => $name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- إضافة المودال الخاص بحذف جميع العناصر -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="deleteAllModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title" id="deleteAllModalLabel">تأكيد حذف الكل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>هل أنت متأكد من حذف كافة العناصر المحددة؟</h3>
                <form id="delete-all-form" action="{{ route('class.destroy_all') }}" method="POST">
                    @csrf
                    <input type="hidden" name="selected_id" id="delete_all_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="submit" form="delete-all-form" class="btn btn-danger">حذف الكل</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('content')
<!-- row -->
<div class="row"></div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection

@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts

<script>
    $(document).ready(function () {
        $("#btn_delete_all").click(function () {
            let selected = [];
            $(".box1:checked").each(function () {
                selected.push($(this).val());
            });

            if (selected.length > 0) {
                $("#delete_all").modal("show");
                $("#delete_all_id").val(selected.join(","));
            }
        });

        $("#example-select-all").on("click", function () {
            $(".box1").prop("checked", this.checked);
        });
    });
</script>
@endsection