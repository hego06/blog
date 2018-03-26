@extends('admin.layout')

@section('header')
Lista de posts
@endsection

@section('content')
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
                    <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection