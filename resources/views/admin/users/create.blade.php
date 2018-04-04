@extends('admin.layout')
@section('content')
    <div class="row">
        <form method="POST" action="{{route('user.store')}}">
            {{csrf_field()}}
            <dvi class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Datos Personales
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                            <label for="name">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ old('name')}}"
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
                                value="{{ old('email')}}"
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
                        <input type="submit" value="Crear Usuario" class="btn btn-primary btn-block">
                    </div>
                </div>
            </dvi>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Roles</h3>
                    </div>
                    <div class="box-body">
                        @forelse($roles as $role)
                            <div class="checkbox">
                                <label for="">
                                    <input name="roles[]" type="checkbox" value="{{$role->name}}">
                                    {{ $role->name }} <br>
                                    <small class="text-muted">{{$role->permissions->pluck('name')->implode(', ')}}</small>
                                </label>
                            </div>
                        @empty
                            <li class="list-group-item">No tiene roles</li>
                        @endforelse
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Roles</h3>
                    </div>
                    <div class="box-body">
                        @forelse($permissions as $id => $name)
                            <div class="checkbox">
                                <label for="">
                                    <input name="permissions[]" type="checkbox" value="{{$name}}">
                                    {{ $name }}
                                </label>
                            </div>
                        @empty
                            <li class="list-group-item">No tiene permisos asignados</li>
                        @endforelse
                    </div>
                </div>
            </div>  
        </form>     
    </div>
@endsection