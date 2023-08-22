<?php

namespace App\Http\Controllers\Checkout;

use App\UseCases\CreateOrderByUserCartUseCase;
use Illuminate\Support\Facades\Auth;

class CreateOrderController
{

    public function __invoke()
    {
        $userId = Auth::id();
        $createOrderByUserCartUseCases = new CreateOrderByUserCartUseCase();
        $order = $createOrderByUserCartUseCases->execute($userId);
        session()->flash(
            'menssage',
            'Su pedido ha sido creado correctamente, enviaremos un mensaje a su correo en los proximos minutos'
        );
        return redirect()->to('/home');
    }
}
