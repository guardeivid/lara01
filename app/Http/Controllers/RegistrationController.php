<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        
        //VALIDACIONES
        //se puede hacer desde una clase propia "form request"
        //php artisan make:request RegistrationRequest
        //y luego inyectarlo en la funcion
        
        //directamente desde el controlador
        /*$this->validate(request(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
        //Otra manera de validar con Validator::make()*/

        //Crear y guardar usuario
        $user = User::create(request(['name', 'email', 'password']));

        //Loguearse
        //\Auth::login();
        auth()->login($user);

        //Enviar Mail al usuario
        //\Mail::to($user)->send(new Welcome($user));
        //enviar con vista markdown
        \Mail::to($user)->send(new WelcomeAgain($user));


        //Manejo de sessiones
        //request()->session('clave', 'valor')
        //session('clave', 'valor')
        //session(['clave' => 'valor'])

        //Sesion valido por 1 solo request
        //session()->flash('clave', 'valor')
        //session()->flash('messagge', 'Registrado con exito')
        //flash('Registrado con exito')

        //obtener el valor
        //session('clave')

        //Redirigir a la ruta home
        //return redirect()->home();
        //redirigir con session flash
        return redirect()->home()->with(['messagge' => 'Registrado con exito']);
    }
}
