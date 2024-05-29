<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'id' => User::ADMINISTRATOR,
            'name' => 'Administrador',
            'description' => 'Administrador de la pagina y sus productos',
        ]);

        DB::table('profiles')->insert([
            'id' => User::CLIENT,
            'name' => 'Cliente',
            'description' => 'Acceso a compras, historial de sus pedidos, etc...',
        ]);
    }
}
