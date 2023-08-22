<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController{

    public function __invoke()
    {
        Auth::logout();
       return redirect()
       ->to('/login')
       ->with('mensage', 'Haz cerrado sesion ');
    }

}