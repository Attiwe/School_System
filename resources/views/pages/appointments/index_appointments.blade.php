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
			<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				Empty</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->

<div class="row row-sm">

	<div class="col-xl-12">
		<div class="card">
			<div class="card-header pb-0">
				<a wire:navigate href="{{ route('appointments.create') }}" class="btn btn-dark">اضافة معيد</a>

				<div class="d-flex justify-content-between mt-3">
					<h4 class="card-title mg-b-0"> ...</h4>
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
 			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap" id="example1">
						<thead class="table-info">

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
							@foreach ($appointments as $appointment)
								<tr class="font-weight-bold">
									<td class="text-primary wd-15p border-bottom-0">{{$loop->iteration}}</td>
									<td class="text-primary wd-15p border-bottom-0"> {{$appointment->name}}</td>
									<td class="text-primary wd-15p border-bottom-0">{{$appointment->email}}</td>
									<td class="text-danger wd-15p border-bottom-0"> {{$appointment->joining_Date}}</td>
									<td class="text-primary wd-15p border-bottom-0"> {{$appointment->specialization->name}}</td>
									<td class="text-danger wd-15p border-bottom-0"> {{$appointment->phone}}</td>
									<td class="text-primary wd-15p border-bottom-0"> {{$appointment->address}}</td>
									<td class="text-primary wd-15p border-bottom-0">
									<a class="btn btn-primary  btn-sm" href="{{route('appointments.edit',$appointment->id)}} "> <i class="fas fa-edit"></i></a>
										 
									<button type="button" class="btn btn-danger  btn-sm" data-toggle="modal"
											data-target="#exampleModalCenter{{$appointment->id}}">
											<i class="fas fa-trash-alt"></i>
										</button>
 									</td>
								</tr>
								<!-- Modal Delete -->
								<div class="modal fade" id="exampleModalCenter{{$appointment->id}}" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle"> عمليه المسح</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="{{route('appointments.destroy', $appointment->id)}}"
													method="POST">
													@csrf
													@method('DELETE')
													<p>هل انت متأكد من عملية الحذف ؟</p>

													<input type="hidden" naem="id" value="{{$appointment->id}}">
													<input class="form-control" type="text" name="name"
														value="{{ $appointment->name }}" readonly>

													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">اغلاق</button>
														<button type="submit" class="btn btn-danger">الحذف</button>
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