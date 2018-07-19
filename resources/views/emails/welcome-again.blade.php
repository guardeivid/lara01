@component('mail::message')
# Bienvenido {{ $user->name }}

El cuerpo del mensaje.

@component('mail::button', ['url' => ''])
Comprobar Mail
@endcomponent

@component('mail::panel', ['url' => ''])
Panel divisor
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::footer')
    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent

{{-- 
cambiar el estilo por otro
php artisan vendor:publish --tag=laravel-mail

Copied Directory [\vendor\laravel\framework\src\Illuminate\Mail\resources\views]
 To [\resources\views\vendor\mail]

Y en el archivo resources/views/vendor/html/themes/default.css
se puede cambiar

tambien se puede usar otro cambiando el nombre a la variable theme en config/mail.php
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ]
--}}