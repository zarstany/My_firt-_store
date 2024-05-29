<?php

namespace app\Repositories;

use App\Models\Shop\Product;
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
    public function getAll(): Collection
    {
        return product::all();
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

