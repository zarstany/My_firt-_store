<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssingProfilesUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('user_profiles')->insert([
            'user_id' => 2,
            'profile_id' => User::CLIENT,
        ]);
        DB::table('user_profiles')->insert([
            'user_id' => 1,
            'profile_id' => User::ADMINISTRATOR,
        ]);
    }
}
