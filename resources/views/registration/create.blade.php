@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<h1>Registracion</h1>

		<form action="register" method="POST">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="name">Nombre:</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
			</div>			
			<div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmacion Contraseña:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
			<button type="submit" class="btn btn-primary">Registrar</button>

            @include('layouts.error')
		</form>
	</div>
@endsection