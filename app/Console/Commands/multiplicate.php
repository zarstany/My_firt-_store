<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class multiplicate extends Command
{
    protected $signature = 'app:multiplicate';
    protected $description = 'Command description';

    public function handle()
    {
        $num = $this -> ask('ingrese un numero');
        for ($i=1; $i <=10 ; $i++) { 
            $result = $num * $i;
            echo "$num x $i = $result \n";
        }
    }
}
