<?php

namespace App\Console\Commands;

use App\Repositories\EloquentProductRepository;
use Illuminate\Console\Command;

class EditProductCommand extends Command
{

    protected $signature = 'app:edit-product-command';
    protected $description = 'Este sera mi comando para editar mis productos';

    public function handle()
    {
        $productId = $this->ask('Ingrese el id del producto a editar');
        $productRepository = new EloquentProductRepository();
        $product = $productRepository->findById($productId);

        $name = $this->ask('Nuevo nombre del producto', $product->name ?? '');
        $image = $this->ask('Nueva imagen', $product->image ?? '');
        $price = floatval($this->ask('nuevo valor', $product->price ?? ''));
        
        $productRepository->update($product, $name, $image, $price);

        $this->info('Producto editado exitosamente');
    }
}
