<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    public $fillable = [
        'sub_total',
        'delivery_amount',
        'iva',
        'total',
        'quantity_product',
        'status',
        'user_id'
    ];
    public function Orderproducts(): HasMany
    {
        return $this->hasMany(orderproducts::class);
    }
}
