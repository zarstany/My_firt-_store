<?php
namespace App\UseCases;

use Illuminate\Database\Eloquent\Collection;

class CalculateSubtoTalAmountUseCases
{
    public function execute(Collection $usercart): int
    {
        $subTotalAmount = 0;
        foreach ($usercart as $cart) {
            $subTotalAmount += $cart->quantity * $cart->product->price;
        }
        return $subTotalAmount;
    }
}