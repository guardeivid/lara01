<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

    </head>
    <body>
        <ul>
            @foreach ($tasks as $task)
			 <li>{{ $task }}</li>	
            @endforeach
		</ul>
	</body>
</html>