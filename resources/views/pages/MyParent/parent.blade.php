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
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

               <!-- start table -->
                <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جدول أولياء الأمور</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-bordered table-striped table-hover text-md-nowrap">
										<thead class="bg-primary text-white">
											<tr>
												<th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">اسم الاب</th>
												<th class="border-bottom-0">تلفون الاب</th>
												<th class="border-bottom-0"> اميل الاب</th>
												<th class="border-bottom-0"> وظيفه الاب</th>
												<th class="border-bottom-0">عنوان الاب</th>
												<th class="border-bottom-0">جوز السفر الاب</th>
												<th class="border-bottom-0"> ديانه الاب</th>
												<th class="border-bottom-0">فصيله دم الاب</th>
												<th class="border-bottom-0">جنسيه الاب</th>

                                                 <th class="border-bottom-0">اسم الام</th>
												<th class="border-bottom-0">تلفون  الام</th>
												<th class="border-bottom-0"> اميل  الام</th>
												<th class="border-bottom-0"> وظيفه  الام</th>
												<th class="border-bottom-0">عنوان  الام</th>
												<th class="border-bottom-0">جوز السفر  الام</th>
												<th class="border-bottom-0"> ديانه  الام</th>
												<th class="border-bottom-0">فصيله دم  الام</th>
												<th class="border-bottom-0">جنسيه  الام</th>
 											</tr>
										</thead>
										<tbody>
                                            @foreach ($parents as $parent)
 											<tr>
                                                <td>{{$loop->iteration}}</td>
												<td>{{$parent->name_father}}</td>
												<td>{{$parent->phone_father}}</td>
												<td>{{$parent->email}}</td>
												<td>{{$parent->job_father}}</td>
												<td>{{$parent->address_father}}</td>
												<td>{{$parent->passport_id_father}}</td>
												<td>{{$parent->religion->name}}</td>
												<td>{{$parent->type_blood->name}}</td>
												<td>{{$parent->nationality->name}}</td>

                                                <td>{{$parent->name_mother}}</td>
												<td>{{$parent->phone_mother}}</td>
												<td>{{$parent->email}}</td>
												<td>{{$parent->job_mother}}</td>
												<td>{{$parent->address_mother}}</td>
												<td>{{$parent->passport_id_mother}}</td>
												<td>{{$parent->religion_mather->name}}</td>
												<td>{{$parent->type_blood_mather->name}}</td>
												<td>{{$parent->nationality_mather->name}}</td>
 											</tr>
                                            @endforeach
										</tbody>
									</table>
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
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

@endsection
