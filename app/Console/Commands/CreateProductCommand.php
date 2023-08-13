<?php

namespace App\Console\Commands;

use App\Repositories\EloquentProductRepository;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{

    protected $signature = 'app:create-product-command';
    protected $description = 'Este sera mi comando para crear productos en mi tienda';
    public function handle()
    {
        $this->info('Creando nuevo producto');
        $name = $this->ask('Nombre del producto');
        $image = $this->ask('Imagen del producto');
        $price = floatval($this->ask('Precio del producto'));
        $productRepository = new EloquentProductRepository();
        $productRepository->store($name, $image, $price);
        $this->warn('Tu producto ha sido creado');
    }
}
