<?php
namespace App\Http\Controllers\Cart;

use App\Repositories\EloquentOrderRepository;
use Illuminate\Support\Facades\Auth;

class HistoryOrderController
{
    public function __invoke()
    {
        $userId = Auth::id();
        $orderRepository = new EloquentOrderRepository();
    
        $orders = $orderRepository->getByUserIdWithOrderProducts($userId);
    
        return view('history', [
            'orders' => $orders,
        ]);
    }
}    