<div class="modal fade" id="exampleModal{{$quizze->id}}" tabindex="-1" role="dialog"
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
                <form action="{{route( 'quizze.delete',  'test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <h3>هل انت متاكد من عملية الحذف ؟</h3><br>
                    <input type="hidden" name="id" value="{{$quizze->id}}" id="id">
                    <input class="form-control" name="name" value="{{$quizze->nameQuizze}}" type="text" readonly>
                    <input class="form-control" name="name" value=" {{ optional( $quizze->teacher )->name ?: ' غير معرف'}}  " type="text" readonly>
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