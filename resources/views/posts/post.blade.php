<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/lara01/public/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    
    <p class="blog-post-meta">
    	{{ $post->user->name }} el 
    	{{ $post->created_at->toFormattedDateString() }}
    </p>

    <p>{{ $post->body }}</p>
</div><!-- /.blog-post -->