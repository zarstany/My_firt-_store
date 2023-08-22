<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'sub_total',
    ];
}
