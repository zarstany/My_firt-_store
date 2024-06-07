<?php

namespace App\Http\Controllers;

use App\UseCases\RegisterUserUseCase;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CreateAccountController
{
    public function __invoke(Request $request)
    {
        try {
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $registerUserUseCase = new RegisterUserUseCase();
            $user = $registerUserUseCase->execute($name, $email, $password);
            session()->flash('Su cuenta ha sido creada');
            return redirect()->to('/login');
        } catch (QueryException $queryException) {
            session()->flash('message', 'El correo electrónico está en uso, intente iniciar sesión.');
            return redirect()->back()->withInput($request->all());
        }
    }
}
