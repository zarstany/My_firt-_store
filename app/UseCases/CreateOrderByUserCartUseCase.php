<?php
namespace App\UseCases;

use App\Models\shop\Order;
use App\Repositories\EloquentCartRepository;
use App\Repositories\EloquentOrderProductRepository;
use App\Repositories\EloquentOrderRepository;

class CreateOrderByUserCartUseCase{

public function execute(int $userId): Order
{
    $cartrepository = new EloquentCartRepository();
    $orderRepository = new EloquentOrderRepository;
    $orderProductRepository = new EloquentOrderProductRepository();
    
    $calculateSubTotalAmountUseCases = new CalculateSubTotalAmountUseCases();
    $calculateDeliveryAmountUseCases = new CalculateDeliveryAmountUseCase();
    $calculateQuantityProductUseCase = new CalculateQuantityProductUseCases();
    
    $carts = $cartrepository->GetUserCart($userId);

     $subtotal = $calculateSubTotalAmountUseCases->execute($carts);
     $deliveryAmount = $calculateDeliveryAmountUseCases->execute($subtotal);
     $calculateTotalAmountUseCases = new CalculateTotalAmountUseCases($subtotal, $deliveryAmount);
     $iva = $calculateTotalAmountUseCases->Getiva();
     $total = $calculateTotalAmountUseCases->getTotal();
     $quantityTotal = $calculateQuantityProductUseCase->execute($carts);
    
     $order = $orderRepository->createOrder(
      $subtotal,
      $deliveryAmount,
      $iva,
      $total,
      $quantityTotal,
      $userId
      
     );
     

     foreach ($carts as $cart) {
        $orderProductRepository->OrderProduct(
            $order->id,
            $cart->product_id,
            $cart->product->price,
            $cart->quantity
        );
     }
     $cartrepository->clearCart($userId);
     return $order;
}
}