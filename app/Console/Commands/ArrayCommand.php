<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArrayCommand extends Command
{
    protected $signature = 'app:array-command';

    protected $description = 'Comando para buscar articulos pares dentro del array';

    public function handle()
    {
      $array = [2, 9 ,33, 132 , 3256 ,34235 , 253523];
      for ($i=0; $i <count($array) ; $i++) { 
        if ($array[$i] % 2 == 0) {
            echo $array[$i] . "\n";
        }
      }
    }
}
