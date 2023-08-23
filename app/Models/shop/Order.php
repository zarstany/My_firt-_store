<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    

    public $fillable = [
        'sub_total',
        'delivery_amount',
        'iva',
        'total',
        'quantity_products',
        'status',
        'user_id'
    ];
    public function orderproduct()
{
    return $this->hasMany(Orderproduct::class);
}

}
