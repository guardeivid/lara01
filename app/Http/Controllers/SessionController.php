<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //intentar autenticar el usuario
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Por favor verifica tus credenciales e intentalo de nuevo.'
            ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
