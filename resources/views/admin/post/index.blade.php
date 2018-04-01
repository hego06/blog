@extends('admin.layout')

@section('header')
Lista de posts
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de post</h3>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-plus"></i> Nuevo post</button>
    </div>
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Resumen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->excerpt}}</td>
                        <td>
                        <a href="{{route('blog.show',$post->id)}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="{{route('post.edit', $post->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

{{--  <div class="modal fade" id="modal-default">
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
</div>  --}}

