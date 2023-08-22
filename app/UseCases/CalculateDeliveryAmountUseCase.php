<?php
namespace App\UseCases;
class CalculateDeliveryAmountUseCase
{
    public function execute(int $subtotal): int
    {
        $deliveryAmount = 0;
        if ($subtotal < 312000){
            $deliveryAmount = 45000;
        }
        if ($subtotal>= 312000 && $subtotal <1412000) {
            $deliveryAmount = 30000;
        }
        if ($subtotal >=141200) {
            $deliveryAmount = 20000;
        }
        return $deliveryAmount;
    }
}