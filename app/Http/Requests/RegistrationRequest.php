<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //esta autorizado a hacer el request cualquier usuario
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed'
        ];
    }

    public function persist()
    {
        //otra manera es despues que valida ejecutar esta funcion desde el controlador $request->persist() y asi queda mas limpio el controlador
        $user->create(
            $this->only(['name', 'email', 'password'])
        );
        auth()->login($user);
        \Mail::to($user)->send(new WelcomeAgain($user));
    }
}
