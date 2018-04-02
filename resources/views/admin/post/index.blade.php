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
                        <a href="{{route('blog.show',$post)}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="{{route('post.edit', $post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{route('post.destroy', $post)}}" style="display:inline">
                        {{csrf_field()}} {{method_field('delete')}}
                            <button class="btn btn-xs btn-danger" onClick="return confirm('Estas seguro que deseas eleiminar este post?')"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

