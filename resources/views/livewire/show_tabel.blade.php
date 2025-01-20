<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصفحات</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الجدول</span>
        </div>
    </div>
</div>

<div>
    <button class="btn btn-primary btn-lg pull-right mb-4" wire:click="show_Tabel" type="button">اضافة ولي أمر</button>
</div>

<div class="row" style="display: flex; justify-content: center; align-items: center; min-height: 20vh;">
    <div class="col-full md-center">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جدول البيانات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <p class="tx-12 tx-gray-500 mb-2">مثال لعرض البيانات باستخدام جدول بسيط. <a href="">تعرف على المزيد</a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover w-100">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>اسم الأب</th>
                                <th>تلفون الأب</th>
                                <th>إيميل الأب</th>
                                <th>وظيفة الأب</th>
                                <th>عنوان الأب</th>
                                <th>جواز سفر الأب</th>
                                <th>ديانة الأب</th>
                                <th>فصيلة دم الأب</th>
                                <th>جنسية الأب</th>
                                <th>اسم الأم</th>
                                <th>تلفون الأم</th>
                                <th>إيميل الأم</th>
                                <th>وظيفة الأم</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($parents as $parent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $parent->name_father }}</td>
                                    <td>{{ $parent->phone_father }}</td>
                                    <td>{{ $parent->email }}</td>
                                    <td>{{ $parent->job_father }}</td>
                                    <td>{{ $parent->address_father }}</td>
                                    <td>{{ $parent->passport_id_father }}</td>
                                    <td>{{ $parent->religion->name ?? 'غير متوفر' }}</td>
                                    <td>{{ $parent->type_blood->name ?? 'غير متوفر' }}</td>
                                    <td>{{ $parent->nationality->name ?? 'غير متوفر' }}</td>
                                    <td>{{ $parent->name_mother }}</td>
                                    <td>{{ $parent->phone_mother }}</td>
                                    <td>{{ $parent->email }}</td>
                                    <td>{{ $parent->job_mother }}</td>
                                    <td class="d-flex justify-content-start"> 
                                    <button type="button" class="btn btn-primary btn-sm" wire:click="editForm({{ $parent->id }})">تعديل</button>

                                        <div>
     
                                        <button type="button" class="btn btn-danger mr-2" data-toggle="modal"
                                            data-target="#exampleModalCenter{{ $parent->id }}">المسح</button>

                                    </td>
                                </tr>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModalCenter{{ $parent->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle"> معلومات الاباء </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('parent.destroy')}} " method="POSt">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>هل انت متأكد من عملية الحذف؟</p>
                                                    <input type="hidden" name="id" value="  {{$parent->id}}  ">
                                                    <input class="form-control" type="text" name="name_father"
                                                        value="{{ $parent->name_father }}" readonly>
                                                    <input class="form-control" type="text" name="name_father"
                                                        value="{{ $parent->name_mother }}" readonly>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                        <button type="submit" class="btn btn-primary">مسح</button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="15" class="text-center">لا توجد بيانات لعرضها</td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>