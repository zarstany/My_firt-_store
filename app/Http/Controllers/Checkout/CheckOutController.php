<?php

namespace App\Http\Controllers\Checkout;

use App\Repositories\EloquentCartRepository;
use App\UseCases\CalculateDeliveryAmountUseCase;
use App\UseCases\CalculateSubtoTalAmountUseCases;
use App\UseCases\CalculateTotalAmountUseCases;
use Illuminate\Support\Facades\Auth;

class CheckoutController 
{
    private const IVA_PERCENTAGE = 0.19;

    public function __invoke()
    {
        $userId = Auth::id();
        $cartRepository = new EloquentCartRepository();
        $calculateSubTotalAmountUseCase = new CalculateSubtoTalAmountUseCases();
        $calculateDeliveryAmountUseCase = new CalculateDeliveryAmountUseCase();
        $carts = $cartRepository->getUserCart($userId);
        $subTotalAmount = $calculateSubTotalAmountUseCase->execute($carts);
        $deliveryAmount = $calculateDeliveryAmountUseCase->execute($subTotalAmount);
        $calculateTotalAmountUseCase = new CalculateTotalAmountUseCases($subTotalAmount, $deliveryAmount);
        $total = $calculateTotalAmountUseCase->getTotal();
        $iva = $calculateTotalAmountUseCase->getIVA();

        return view('checkout', [
            'subTotal' => $subTotalAmount,
            'deliveryAmount' => $deliveryAmount,
            'iva' => $iva,
            'total' => $total,
        ]);
    }
}