@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h3 class="content-title mb-0 my-auto">
                <i class="fa-solid fa-circle-exclamation text-primary"></i> الحضور والغياب
            </h3>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="">الرجوع</a></span>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@endsection

@section('content')





<div class="row row-sm">
    <div class="col-xl-12">
        <div class="d-flex align-items-center justify-content-between mb-3">

        </div>
        <div class="card mt-5">

            <div class="col-xl-12">
                <div class="card-header pb-0">

                    <p class="tx-12 tx-gray-500 mb-2"> الحضور والغياب <a href="#">تعرف على المزيد</a></p>

                    <div class="row card">
                        <div class="card-body">
                            <div class="table-responsive">

                                @foreach ($grades as $grade)
                                    <div class="accordion accordion-flush" id="accordionFlush{{ $grade->id }}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading{{ $grade->id }}">
                                                <button
                                                    class="accordion-button collapsed text-primary p-3 mb-2 bg-body text-white "
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse{{ $grade->id }}" aria-expanded="false"
                                                    aria-controls="flush-collapse{{ $grade->id }}">
                                                    {{ $grade->name }}
                                                </button>
                                            </h2>

                                            <div id="flush-collapse{{ $grade->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading{{ $grade->id }}"
                                 data-bs-parent="#accordionFlush{{ $grade->id }}">
                                 <div class="accordion-body">
                                     <div class=" row  ">
                                         <div class="col-xl-12">
                                             <div class="card">
                                                 <div class="card-body">
                                             <div class="table-responsive">
                                                 <table class="table table-hover text-md-nowrap"
                                                     id="table{{ $grade->id }}">
                                                     <thead class="">
                                                         <tr class="font-weight-bold">
                                                 <th class="py-3 fw-bold fs-6">
                                                     <h5>#</h5>
                                                 </th>
                                                 <th class="py-3 fw-bold fs-6">
                                                     <h5>اسم الفصل</h5>
                                                 </th>
                                                 <th class="py-3 fw-bold fs-6">
                                                     <h5>المرحلة الدراسية</h5>
                                                 </th>
                                                 <th class="py-3 fw-bold fs-6">
                                                  <h5>الفصل الدراسي</h5>
                                              </th>
                                              <th class="py-3 fw-bold fs-6">
                                                  <h5> الطلاب </h5>
                                              </th>
                                          </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach ($grade->sections as $section)
                                                      <tr>
                                                          <td>{{ $loop->iteration }}</td>
                                                                      <td class="text-primary">
                                                                          {{ $section->nameSectian }}
                                                                      </td>
                                                                      <td class="text-primary">
                                                                          {{ $grade->name }}
                                                                      </td>
                                                                      <td class="text-primary">
                                                        {{ $section->classRom->nameClass }}
                                                    </td>
                                                    <td>
                                                        <form action="{{route('attendence.show',$grade->id)}}">
                                                          <input type="hidden" name="section_id" value="{{$section->id}}" >
                                                         <input type="hidden" name="class_id" value="{{$section->classRom->id}}" >
                                                           <button type="submit" class="btn btn-sm btn-primary"> الطلاب </button>
                                                        </form>
                                                        </td>
                                                                  </tr>
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
              @endforeach

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

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('table[id^="table"]').DataTable();
    });
</script>
@endsection