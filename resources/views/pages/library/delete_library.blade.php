<div class="modal fade" id="exampleModal{{$library->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">عملية الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route( 'library.delete',  'test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                    <input type="hidden" name="id" value="{{$library->id}}" id="id">
                     <input class="form-control" name="name" value="  {{ $library->file_name }} " type="hidden" readonly>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
                            اغلاق </button>
                        <button type="submit" class="btn btn-sm btn-danger"> حذف </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>