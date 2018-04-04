@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/adminlte/img/user4-128x128.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Publicaciones</b> <a class="pull-right">{{$user->posts()->count()}}</a>
                </li>
                <li class="list-group-item">
                  <b>Publicaciones</b> <a class="pull-right">{{$user->getRoleNames()->implode(', ')}}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-3">
        <div class="box box-primary">            
            <div class="box-header with-border">
                <h3 class="box-title">Publicaciones</h3>
            </div>
            <div class="box-body ">
                @foreach($user->posts as $post)
                    <a href="{{route('blog.show',$post)}}" target="_blank">
                        <strong>{{$post->title}}</strong><br><hr>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class='col-md-3'>
        <div class='box box-primary'>
            <div class='box-header with-border'>
                <h3 class='box-title'>Roles</h3>
            </div>
            <div class='box-body'>
                @forelse ($user->roles as $role)
                    <strong>
                        {{ $role->name}}
                    </strong>
                    <br>
                    @if ($role->permissions->count() > 0)
                        <small class='text-muted'>
                            Permisos:
                            {{ $role->permissions->pluck('name')->implode(', ') }}
                        </small>
                    @endif
                    @unless($loop->last)
                        <hr>
                    @endunless
                @empty
                    <small class='text-muted'>
                        No tiene ningún rol asignado.
                    </small>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class='box box-primary'>
            <div class='box-header with-border'>
                <h3 class='box-title'>Permisos Adicionales</h3>
            </div>
            <div class='box-body'>
                @forelse ($user->permissions as $permission)
                    <strong>
                        {{ $permission->name}}
                    </strong>
                    @unless($loop->last)
                        <hr>
                    @endunless
                @empty
                    <small class='text-muted'>
                        No posee permisos adicionales
                    </small>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection