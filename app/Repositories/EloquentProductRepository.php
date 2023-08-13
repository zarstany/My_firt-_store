<?php

namespace app\Repositories;

use App\Models\shop\product;
use Illuminate\Database\Eloquent\Collection;


class EloquentProductRepository
{
    public function store(string $name, string $image, float $price): void
    {
        product::create([
            'name' => $name,
            'image' => $image,
            'price' => $price

        ]);
    }
    public function Getall(array $columns): Collection
    {
        return product::all($columns);
    }
   
    public function update(product $product, string $name, string $image, float $price): void
    {

        $product->name = $name;
        $product->image = $image;
        $product->price = $price;
        $product ->save();
    }
    public function findById(int $productId):?product {
        return product::find($productId);
    }
        public function delete(int $productId): void{
             product::Find($productId)->delete();
        }
    }

