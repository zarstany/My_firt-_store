<?php
namespace App\Http\Controllers\Cart;

use App\Repositories\EloquentCartRepository;
use App\UseCases\CalculateQuantityProductUseCases;
use App\UseCases\CalculateSubtoTalAmountUseCases;
use Illuminate\Support\Facades\Auth;

class CartSummaryController
{
    public function __invoke()
    {
        $userId = Auth::id();
        $cartRepository = new EloquentCartRepository();

        $carts = $cartRepository->getUserCart($userId);
        $calculateQuantityProductsUseCase = new CalculateQuantityProductUseCases();
        $calculateSubTotalAmountUseCase = new CalculateSubtoTalAmountUseCases();
        $quantityTotal = $calculateQuantityProductsUseCase->execute($carts);
        $amountTotal = $calculateSubTotalAmountUseCase->execute($carts);

        return view('cart-summary', [
            'carts' => $carts,
            'quantityTotal' => $quantityTotal,
            'amountTotal' => $amountTotal
        ]);
    }
}