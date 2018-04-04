@extends('admin.layout')

@section('header')
Lista de usuarios
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de usuarios</h3>
        <a href="{{route('user.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> Nuevo usuario</a>
    </div>
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Resumen</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->getRoleNames()->implode(', ')}}</td>
                        <td>
                        <a href="{{route('user.show',$user)}}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                        <a href="{{route('user.edit', $user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{route('user.destroy', $user)}}" style="display:inline">
                        {{csrf_field()}} {{method_field('delete')}}
                            <button class="btn btn-xs btn-danger" onClick="return confirm('Estas seguro que deseas eleiminar este usuario?')"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

