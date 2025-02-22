

<div class="modal fade" id="exampleModalCenter{{$payment->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('paymentStudnet.delete', 'test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                    <input type="hidden" name="id" value="{{$payment->id}}" id="id">
                    <input class="form-control" name="name" value="{{$payment->student->name ?? 'sdf'}}" type="text" readonly>
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