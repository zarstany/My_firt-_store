<?php
 namespace App\Repositories;

use App\Models\shop\Orderproduct;
use App\Models\shop\orderproducts;

 class EloquentOrderProductRepository
 {
     public function OrderProduct(int $OrderId, int $product_Id, int $price, int $quantity): Orderproduct
     {
        return Orderproduct::Create([
            'order_id' => $OrderId,
            'product_id' => $product_Id,
            'price' => $price,
            'quantity' => $quantity,
            'sub_total' => $price * $quantity,

        ]);

     }
 }