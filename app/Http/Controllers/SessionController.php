<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        //guest es para usuarios no autorizados
        $this->middleware('guest', ['except' => ['destroy','create','store']]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        auth()->logout();

        //intentar autenticar el usuario
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Por favor verifica tus credenciales e intentalo de nuevo.'
            ]);
        };

        return redirect()->route('home');
    }

    public function destroy()
    {
        auth()->logout();
        //dd(route('home'));
        return redirect()->route('home');
    }
}
