<!DOCTYPE html>
<html lang="">
	<head>
	</head>
	<body>
		<h1 class="text-center">Bienvenido a el Blog, {{ $user->name }}</h1>
	</body>
</html>

{{-- 
Probar mail con mailtrap.io
crear cuenta o conectarse con google o github
https://mailtrap.io/inboxes
crear inbox "demo" o usar el "Demo inbox" de prueba
copiar en .env el puerto, usuario, y clave del protocolo SMTP
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=admin@server.com
MAIL_FROM_NAME=Administrador

--}}