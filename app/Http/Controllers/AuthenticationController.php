<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentUserrepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController
{
    public function __invoke(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $userrepository = new EloquentUserrepository();
        $userOrNull = $userrepository->findByEmail($email);

        if (!is_null($userOrNull) && Hash::check($password, $userOrNull->password)) {
            Auth::login($userOrNull);
            return redirect()->to('/home');
        }
    }
}
