@extends ('layouts.master')


@section('content')
<div class="col-md-8 blog-main">
	<h1>{{ $post->title }}</h1>
	{{ $post->body }}
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)                
                <li class="list-group-item">
                    <strong>{{ $comment->created_at->diffForHumans() }}</strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>

    <hr>

    {{-- Agregar un comentario --}}
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/lara01/public/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Tu comentario aqui" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Agregar Comentario</button>
                </div>
            </form>
            @include('layouts.error')
        </div>
    </div>
</div>
@endsection