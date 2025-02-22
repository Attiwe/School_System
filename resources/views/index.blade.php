@extends('layouts.master')
@section('css')
	<!--  Owl-carousel css-->
	<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
	<!-- Maps css -->
	<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="left-content">
			<div>
				<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 text-primary "> لوحه تحكم الادمن <span
						class="text-danger "> {{ Auth::user()->name ?? ' -- ' }}<span> </h2>
				<p class="mg-b-0"> </p>
			</div>
		</div>
		<div class="main-dashboard-header-right">

			<div>
				<label class="tx-13"> التاريخ </label>
				<h5 class="text-primary"> {{ date('Y-m-d') }} </h5>
			</div>
			<div>
				<label class="tx-13 text-dark">التوقيت الحالي </label>
				<h5 class="text-primary font-weight-bold">
					{{ \Carbon\Carbon::now('Africa/Cairo')->format('H:i:s') }}
				</h5>
			</div>

		</div>
	</div>
	<!-- /breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<style>
		.custom-card {
			transition: transform 0.3s ease, box-shadow 0.3s ease;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			border-radius: 12px;
			overflow: hidden;
		}


		.custom-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
		}
	</style>

	<div class="row">
		<!-- عدد الطلاب -->
		<div class="col-md-6 col-12">
			<div class="card custom-card bg-primary-gradient">
				<div class="p-4">
					<div class="mb-3 text-center">
						<h3 class="text-light font-weight-bold">عدد الطلاب</h3>
					</div>
					<a href="{{ route('student.show') }}" target="_blank" class="text-decoration-none">
						<div class="d-flex align-items-center justify-content-between">
							<div>
								<h4 class="tx-20 font-weight-bold text-white">
									{{ \App\Models\Student::count() ?? '0' }} طلاب
								</h4>
								<p class="mb-0 tx-12 text-white op-7">جميع الطلاب في المراحل الدراسية</p>
							</div>
							<span class="icon-container">
								<i class="fa-solid fa-graduation-cap text-white fa-3x"></i>
							</span>
						</div>
					</a>
				</div>
			</div>
		</div>

		<!-- عدد الدكاترة -->
		<div class="col-md-6 col-12">
			<div class="card custom-card bg-danger-gradient">
				<div class="p-4">
					<div class="mb-3 text-center">
						<h3 class="text-light font-weight-bold">عدد الدكاترة</h3>
					</div>
					<a href="{{ route('teacher.index') }}" target="_blank" class="text-decoration-none">
						<div class="d-flex align-items-center justify-content-between">
							<div>
								<h4 class="tx-20 font-weight-bold text-white">
									{{ \App\Models\Teacher::count() ?? '0' }} دكتور
								</h4>
								<p class="mb-0 tx-12 text-white op-7">جميع الدكاترة في المراحل الدراسية</p>
							</div>
							<span class="icon-container">
								<i class="fa-solid fa-user-tie text-white fa-3x"></i>
							</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- row closed -->
	<div class="card mg-b-20" id="tabs-style2">
		<div class="card-body">
			<h3 class="text-primary mb-3 "> اخر العمليات علي النطام </h3>

			<div class="text-wrap">
				<div class="example">
					<div class="panel panel-primary tabs-style-2">
						<div class=" tab-menu-heading">
							<div class="tabs-menu1">
								<!-- Tabs -->
								<div class="tabs-menu1">
									<!-- Tabs -->
									<ul class="nav panel-tabs main-nav-line">
										<li><a href="#tab4" class="nav-link active" data-toggle="tab">
												الطالب</a></li>
										<li><a href="#tab5" class="nav-link" data-toggle="tab"> الدكاترة </a></li>
										<li><a href="#tab6" class="nav-link" data-toggle="tab"> الفوتير </a></li>
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
												<tr>
													<th class="text-primary font-weight-bold "> # </th>
													<th class="text-primary font-weight-bold "> الاسم </th>
													<th class="text-primary font-weight-bold "> البريد الالكتروني </th>
													<th class="text-primary font-weight-bold "> تاريخ التسجيل </th>
												</tr>
												@forelse(\App\Models\Student::latest()->take(5)->get() as $student)
													<tr>
														<td> {{ $loop->index + 1 }} </td>
														<td class="text-dark font-weight-bold "> {{ $student->name }} </td>
														<td class="text-dark font-weight-bold"> {{ $student->email }} </td>
														<td class="text-danger font-weight-bold">
															{{ $student->created_at->format('Y-m-d H:i') }}
														</td>

													</tr>
												@empty
													<tr>
														<td colspan="3" class="text-center text-danger">لا يوجد طلاب مسجلين بعد
														</td>
													</tr>
												@endforelse

											</tbody>
										</table>

									</div>
								</div>

								<div class="tab-pane" id="tab5">
									<div class="table-responsive mt-4">
										<table class="table text-md-nowrap table-bordered table-hover">
											<thead class="table-info text-center">
												<tr>
													<th>
														<h4> # </h4>
													</th>
													<th>
														<h4> الاسم </h4>
													</th>
													<th>
														<h4> البريد الالكتروني </h4>
													</th>
													<th>
														<h4>تاريخ الالتحاق </h4>
													</th>

												</tr>
											</thead>
											<tbody>
												@forelse(\App\Models\Teacher::latest()->take(4)->get() as $teacher)	
														<tr>
														<tr>
															<td> {{ $loop->index + 1 }} </td>
															<td class="text-primary font-weight-bold "> {{ $teacher->name }} </td>
															<td class="text-primary font-weight-bold"> {{ $teacher->email }} </td>
															<td class="text-danger font-weight-bold">
																{{ $teacher->created_at->format('Y-m-d H:i') }}
															</td>

														</tr>
														</tr>
													</tbody>
												@empty
													<tr>
														<td colspan="3" class="text-center text-danger">لا يوجد طلاب مسجلين بعد
														</td>
													</tr>
												@endforelse

										</table>
									</div>
								</div>


								<div class="tab-pane" id="tab6">
									<div class="table-responsive mt-4">
										<table class="table text-md-nowrap table-bordered table-hover">
											<thead class="table-info text-center">
												<tr>

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

												</tr>
											</thead>
											<tbody>
												@forelse(\App\Models\FeesInvoice::latest()->take(5)->get() as $fees)		
													<tr>
														<td> {{ $loop->iteration }} </td>
														<td class="text-info font-weight-bold ">
															{{ $fees->student->name ?? 'تم حذفه' }}
														</td>
														<td class="text-primary font-weight-bold ">
															{{ $fees->grade->name ?? 'تم حذفه' }}
														</td>
														<td class="text-primary font-weight-bold ">
															{{ $fees->class->nameClass ?? 'تم حذفه' }}
														</td>
														<td class="text-primary font-weight-bold ">
															{{ $fees->fees->title ?? 'تم حذفه' }}
														</td>
														<td class="text-danger font-weight-bold "> {{ $fees->amount}} </td>
														<td class="text-danger font-weight-bold "> {{ $fees->fees->year}} </td>
														<td class="text-danger font-weight-bold "> {{ $fees->invoice_date}}
														</td>
													</tr>
												@empty
													<tr>
														<td colspan="3" class="text-center text-danger">لا يوجد فواتير مسجلة بعد
														</td>
													</tr>
												@endforelse

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


	<!-- Container closed -->
@endsection
@section('js')
	<!--Internal  Chart.bundle js -->
	<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
	<!-- Moment js -->
	<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
	<!--Internal  Flot js-->
	<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
	<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
	<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
	<!--Internal Apexchart js-->
	<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
	<!-- Internal Map -->
	<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
	<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
	<!--Internal  index js -->
	<script src="{{URL::asset('assets/js/index.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection