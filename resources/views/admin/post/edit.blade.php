@extends('admin.layout')

@section('header')
Crear nuevo post 
@endsection

@section('content')

<div class="row">
    @if($post->photos->count())
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
            @foreach($post->photos as $photo)
                <form method="POST" action="{{route('photo.destroy', $photo)}}">
                    {{method_field('delete')}}{{csrf_field()}}
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-xs" style="position:absolute">
                            <i class="fa fa-remove"></i>
                        </button>
                        <img class="img-responsive" src="{{url($photo->url)}}" alt="">
                    </div>
                </form>
            @endforeach
            </div>
        </div>
    </div>
    @endif
    <form method="POST" action="{{route('post.update', $post)}}">
        @csrf
        {{method_field('PUT')}}
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group {{$errors->has('title')?'has-error':''}}">
                        <label for="">Título de la publicación</label>
                        <input type="text" class="form-control" name="title" value="{{old('title', $post->title)}}" placeholder="Ingresa aqui el título de la publicación">
                    </div>
                    <div class="form-group {{$errors->has('body')?'has-error':''}}">
                            <label for="">Contenido</label>
                            <textarea rows="10" name="body" id="editor"class="form-control" placeholder="Ingresa el contenido la publicación">{{old('body',$post->body)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="published_at" value="{{old('published_at',isset($post->published_at)? $post->published_at->format('Y-m-d'):'')}}" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                        <label for="">Categoría</label>
                        <select name="category_id" class="form-control select2" id="">
                            <option value="">Selecciona una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona uno o más tags"
                            style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected':''}}
                                value={{$tag->id}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                            <label for="">Resumen la publicación</label>
                            <textarea rows="4" name="excerpt" class="form-control" placeholder="Ingresa un resumen de la publicación">{{old('excerpt',$post->excerpt)}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="dropzone">
                        
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('sc')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
<script>
    new Dropzone('.dropzone',{
    url: '/post/{{$post->id}}/photo',
    acceptedFiles: 'image/*',
    maxFilesize: 2,
    paramName: 'photo',
    headers:{
      'X-CSRF-TOKEN':'{{ csrf_token() }}'
    },
    dictDefaultMessage: 'Arrastra aquí las imagenes para subirlas'
  });

  Dropzone.autoDiscover = false;
</script>

@endsection
