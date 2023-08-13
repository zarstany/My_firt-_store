<?php

namespace App\Console\Commands;

use App\Repositories\EloquentProductRepository;
use Illuminate\Console\Command;

class DeleteProductCommand extends Command
{
    protected $signature = 'app:delete-product-command';
    protected $description = 'Con este comando eliminatemos los productos';
    public function handle()
    {
        $productId = $this->ask('ingrese el id del producto que desea eliminar');
        $productRepository = new EloquentProductRepository();
        $product = $productRepository ->delete($productId);
        $this->warn('Producto eliminado');
    }
}
