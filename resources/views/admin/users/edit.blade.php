@extends('admin.layout')
@section('header')
Editar usuario
@endsection
@section('content')
    <div class="row">
        <dvi class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Datos Personales
                    </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{route('user.update',$user)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                        <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                            <label for="name">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ old('name', $user->name)}}"
                                placeholder="Ingrese el nombre de usuario"
                                autofocus
                            >
                            {!! $errors->first('name','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                            <label for="email">Email</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="email" 
                                value="{{ old('email', $user->email)}}"
                                placeholder="Ingrese el email del usuario"
                            >
                            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                            <label for="password">Contraseña</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                placeholder="Ingrese el Contraseña del usuario"
                            >
                            <span class="help-block">
                                Dejar en blanco para no cambiar la Contraseña.
                            </span>
                            {!! $errors->first('password','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                placeholder="Repite la Contraseña del usuario"
                            >
                        </div>
                        <input type="submit" value="Actualizar Usuario" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </dvi>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <div class="box-body">
                    {{--  @role('Admin')
                        <form action="{{ route('user.update', $user) }}" method="post">
                            {{ csrf_field() }} {{ method_field('PUT') }}
                            @include('admin.roles.checkboxes',['model' => $user])
                            <input type="submit" value="Actualizar Roles" class="btn btn-primary btn-block">
                        </form>
                    @else  --}}
                        <form method="POST" action="{{route('user_role.update', $user)}}">
                            {{csrf_field()}} {{method_field('PUT')}}
                            @forelse($roles as $role)
                                <div class="checkbox">
                                    <label for="">
                                        <input name="roles[]" type="checkbox" value="{{$role->name}}" {{$user->roles->contains($role->id) ? 'checked':''}}>
                                        {{ $role->name }} <br>
                                        <small class="text-muted">{{$role->permissions->pluck('name')->implode(', ')}}</small>
                                    </label>
                                </div>
                            @empty
                                <li class="list-group-item">No tiene roles</li>
                            @endforelse

                            <button class="btn btn-primary">Actualizar roles</button>
                        </form>
                    {{--  @endrole  --}}
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <div class="box-body">
                        <form method="POST" action="{{route('user_permission.update', $user)}}">
                            {{csrf_field()}} {{method_field('PUT')}}
                            @forelse($permissions as $id => $name)
                                <div class="checkbox">
                                    <label for="">
                                        <input name="permissions[]" type="checkbox" value="{{$name}}" {{$user->permissions->contains($id) ? 'checked':''}}>
                                        {{ $name }}
                                    </label>
                                </div>
                            @empty
                                <li class="list-group-item">No tiene permisos asignados</li>
                            @endforelse

                            <button class="btn btn-primary">Actualizar permisos</button>
                        </form>
                    {{--  @endrole  --}}
                </div>
            </div>
        </div>       
    </div>
@stop