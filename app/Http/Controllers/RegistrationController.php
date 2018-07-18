<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
		return view('registration.create');
    }

    public function store()
    {
		//Otra manera de Validar Validator::make
		$this->validate(request(), [
            'name' 		=> 'required|string|max:255',
            'email' 	=> 'required|string|email|max:255|unique:users',
            'password' 	=> 'required|string|min:6|confirmed',
        ]);

		//Crear y guardar usuario
		$user = User::create(request(['name', 'email', 'password']));

		//Loguearse
		//\Auth::login();
		auth()->login($user);

		//Redirigir a la ruta home
		return redirect()->home();
    }
}
