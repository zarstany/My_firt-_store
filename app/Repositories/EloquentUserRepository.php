<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUserrepository{ 
    public function store(string $name, string $email, string $password): void{
    $passwordHash = Hash::make($password);
    User::create([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);
}
    public function findByEmail(string $email): ?User{
        return User::where('email', '=', $email)->first();
    }
}