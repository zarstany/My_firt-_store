<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController
{
    public function __invoke(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $userRepository = new EloquentUserRepository();
        $userOrNull = $userRepository->findByEmail($email);

        if (!is_null($userOrNull) && Hash::check($password, $userOrNull->password)) {
           Auth::login($userOrNull);
           return redirect()->to('/home');
        }
        return redirect()->back();
    }
}
