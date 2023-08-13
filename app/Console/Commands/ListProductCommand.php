<?php

namespace App\Console\Commands;

use App\Repositories\EloquentProductRepository;
use Illuminate\Console\Command;

class ListProductCommand extends Command
{
    protected $signature = 'app:list-product-command';
      protected $description = 'Este comando es para listar nuestros productos';
    public function handle()
    {
       $this->info('Listado de productos');
       $productRepository = new EloquentProductRepository();
       $product = $productRepository ->getAll(['id', 'name', 'image', 'price' ]);
       $this->table(['ID', 'name', 'image', 'price'], $product);

    }
}
