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
        $name = $this->ask('Nombre');
        $image = $this->ask('Link de la imagen ');
        $price = floatval($this->ask('Precio '));
        $productRepository = new EloquentProductRepository();
        $productRepository->store($name, $image, $price);
        $this->warn('Tu producto ha sido creado');
    }
}
