<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;
    protected $table = 'order_products';

    public $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'sub_total',
    ];
}
