@extends('admin.layout')

@section('header')
Crear nuevo post 
@endsection

@section('content')

<div class="row">
    <form method="POST" action="{{route('post.store')}}">
    @csrf
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group {{$errors->has('title')?'has-error':''}}">
                    <label for="">Título de la publicación</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Ingresa aqui el título de la publicación">
                </div>
                <div class="form-group {{$errors->has('body')?'has-error':''}}">
                        <label for="">Contenido</label>
                        <textarea rows="10" name="body" id="editor"class="form-control" placeholder="Ingresa el contenido la publicación">{{old('body')}}</textarea>
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
                        <input type="text" name="published_at" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
                <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                    <label for="">Categoría</label>
                    <select name="category_id" class="form-control" name="" id="">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tags</label>
                    <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona uno o más tags"
                        style="width: 100%;">
                        @foreach($tags as $tag)
                            <option value={{$tag->id}}>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                        <label for="">Resumen la publicación</label>
                        <textarea rows="4" name="excerpt" class="form-control" placeholder="Ingresa un resumen de la publicación">{{old('excerpt')}}</textarea>
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

{{--  @push('styles')
<link rel="stylesheet" href='{{asset("adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}'>
@endpush
<script src='{{asset("adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}'></script>
<script>
    $('#datepicker').datepicker({
        autoclose: true
    })
</script>
@push('scripts')  --}}