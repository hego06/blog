@extends('layout.principal')
@section('content')

@foreach($posts as $post)
<section class="posts container">
    <article class="post">
        @if($post->photos->count()==1)
        <figure><img src="{{$post->photos->first()->url}}" alt="" class="img-responsive"></figure>
        @elseif($post->photos->count() > 1)
            <div class="gallery-photos" data-masonry='{"itemSelector":".grid-item","columnWidth":464}'>
                @foreach($post->photos->take(4) as $photo)
                    <figure class="grid-item grid-item--height2">
                        @if($loop->iteration == 4)
                            <div class="overlay">{{$post->photos->count()}} Fostos</div>
                        @endif
                        <img src="{{url($photo->url)}}" class="img-responsive"></img>
                    </figure>
                @endforeach
            </div>
        @endif
        <div class="content-post">
            <header class="container-flex space-between">
                <div class="date">
                    <span class="c-gray-1">{{$post->published_at->diffForHumans()}}</span>
                </div>
                <div class="post-category">
                    <span class="category text-capitalize">{{$post->category->name}}</span>
                </div>
            </header>
            <h1>{{$post->excerpt}}</h1>
            <div class="divider"></div>
            <p>{!!$post->body!!}</p>
            <footer class="container-flex space-between">
                <div class="read-more">
                    <a href="blog/{{$post->id}}" class="text-uppercase c-green">read more</a>
                </div>
                <div class="tags container-flex">
                    @foreach($post->tags as $tag)
                    <span class="tag c-gray-1 text-capitalize">{{'#'.$tag->name}}</span>
                    @endforeach
                </div>
            </footer>
        </div>
    </article>

</section>
@endforeach
<div class="pagination">
    <ul class="list-unstyled container-flex space-center">
        <li><a href="#" class="pagination-active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</div>

@endsection