<div class="modal fade" id="modal-default">
<form method="POST" action="{{route('post.store')}}">
@csrf
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Agrega el titulo de la publicación Modal</h4>
        </div>
        <div class="modal-body">
            <div class="form-group {{$errors->has('title')?'has-error':''}}">
                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Ingresa aqui el título de la publicación" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit " class="btn btn-primary">Save changes</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</form>
</div>