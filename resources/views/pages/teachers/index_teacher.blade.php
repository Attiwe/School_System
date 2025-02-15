@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">الصفحات</h4>
			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				<a href="{{ route('teacher.index') }}">
					<i class="fas fa-arrow-left"></i> الرجوع
				</a>
			</span>
		</div>
	</div>
</div>


@section('page-header')
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


<div class="row row-sm">

	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mb-3">

		</div>
		<div class="card mt-5">

			<div class="col-xl-12">
				<div class="card-header pb-0">

					<p class="tx-12 tx-gray-500 mb-2"> ترقيه الطلاب <a href="#">تعرف على المزيد</a></p>

					<div class="row card">
						<div class="card-body">
							<div class="table-responsive">
								<div class="row row-sm">
									<div class="col-xl-12">
										<div class=" ">
											<div class="card-header pb-0">
												<div class="d-flex justify-content-between">

													<a wire:navigate href="{{ route('teacher.create') }}"
														class="btn btn-dark">اضافة دكتور</a>

													<h2 class="card-title mg-b-0">معلومات الدكاتره</h2>
													<i class="mdi mdi-dots-horizontal text-gray"></i>
												</div>

											</div>

										</div>
									</div>


									<div class="table-responsive">
										<table class="table text-md-nowrap " id="example1">
											<thead class="table-secondary">
												<tr>
													<th class="wd-15p border-bottom-0">
														<h5>#</h5>
													</th>
													<th class="wd-15p border-bottom-0">
														<h5>الاسم</h5>
													</th>
													<th class="wd-15p border-bottom-0">
														<h5>ايميل</h5>
													</th>
													<th class="wd-20p border-bottom-0">
														<h5>تاريخ الانضمام</h5>
													</th>
													<th class="wd-15p border-bottom-0">
														<h5>الجنس</h5>
													</th>
													<th class="wd-15p border-bottom-0">
														<h5>التخصص</h5>
													</th>
													<th class="wd-10p border-bottom-0">
														<h5>التلفون</h5>
													</th>
													<th class="wd-25p border-bottom-0">
														<h5>العنوان</h5>
													</th>
													<th class="wd-25p border-bottom-0">
														<h5>العمليات</h5>
													</th>
												</tr>

											</thead>
											<tbody>
												@foreach ($teachers as $teacher)

													<tr class="font-weight-bold">
														<td class="wd-15p border-bottom-0 text-primary  ">
															{{$loop->iteration}}</td>
														<td class="wd-15p border-bottom-0 text-primary">{{$teacher->name}}
														</td>
														<td class="wd-15p border-bottom-0 text-primary">{{$teacher->email}}
														</td>
														<td class="wd-15p border-bottom-0 text-danger">
															{{$teacher->joining_Date}}</td>
														<td class="wd-15p border-bottom-0 text-primary">
															{{$teacher->gender}}</td>
														<td class="wd-15p border-bottom-0 text-primary">
															{{$teacher->Specialization->name}}</td>
														<td class="wd-15p border-bottom-0 text-danger">{{$teacher->phone}}
														</td>
														<td class="wd-15p border-bottom-0 text-primary">
															{{$teacher->address}}</td>
														<td>
															<a class="btn btn-primary  btn-sm"
																href="{{route('teacher.edit', $teacher->id)}}"> <i
																	class="fas fa-edit"></i></a>
															<button type="button" class="btn btn-danger  btn-sm"
																data-toggle="modal"
																data-target="#exampleModalCenter{{$teacher->id}}">
																<i class="fas fa-trash-alt"></i>
															</button>

													</tr>

													<!-- Modal Delete -->
													<div class="modal fade" id="exampleModalCenter{{$teacher->id}}"
														tabindex="-1" role="dialog"
														aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">
																		عمليه المسح</h5>
																	<button type="button" class="close" data-dismiss="modal"
																		aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form
																		action="{{route('teacher.destroy', $teacher->id)}}"
																		method="POST">
																		@csrf
																		@method('DELETE')
																		<p>هل انت متأكد من عملية الحذف ؟</p>

																		<input type="hidden" naem="id"
																			value="{{$teacher->id}}">
																		<input class="form-control" type="text" name="name"
																			value="{{ $teacher->name }}" readonly>

																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary"
																				data-dismiss="modal">اغلاق</button>
																			<button type="submit"
																				class="btn btn-danger">الحذف</button>
																		</div>
																	</form>
																</div>

															</div>
														</div>
													</div>



												@endforeach
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