@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<h1>Ingresar</h1>

		<form action="login" method="POST">
			{{ csrf_field() }}
					
			<div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
			<button type="submit" class="btn btn-primary">Ingresar</button>

            @include('layouts.error')
		</form>
	</div>
@endsection