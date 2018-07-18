@extends ('layouts.master')


@section('content')
    <div class="col-md-8 blog-main">
    	<h1>Crear un post</h1>

    	<form action="../posts" method="POST" role="form">
    		{{ csrf_field() }}    	
    		<div class="form-group">
    			<label for="title">Title</label>
    			<input name="title" type="text" class="form-control" id="title">
    		</div>
    		<div class="form-group">
    			<label for="body">Body</label>
    			<textarea name="body" id="body" class="form-control" rows="3"></textarea>
    		</div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>    		
            @include('layouts.error')
    	</form>
    </div>
@endsection