<?php

namespace App\Console\Commands;

use App\Repositories\EloquentOrderRepository;
use Illuminate\Console\Command;

class ChangeOrderStatusCommand extends Command
{

    protected $signature = 'app:change-order-status-command';

    protected $description = 'Este comando es para cambiar el estado de mis ordenes';


    public function handle(): void
    {
        $this->info('CAMBIO DE ESTADO DE UNA ORDEN'); {
            $orderRepository = new EloquentOrderRepository();
            $orderId = (int) $this->ask('Indique código de la orden: ');
            $order = $orderRepository->findByID($orderId);
            if (is_null($order)) {
                $this->warn('La orden no existe.');
                return;
            }
            $options = [0 => 'pending', 1 => 'complete', 2 => 'cancel'];
            $key = array_search($order->status, $options);
            unset($options[$key]);
            $newStatus = $this->choice('Seleccione el nuevo estado de la orden', $options);
            $orderRepository->updateStatusByOrderId($orderId, $newStatus);
            $this->info('La orden fue actualizada.');
        }
    }
}
