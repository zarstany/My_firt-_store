<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository
{
    public function store(string $name, string $email, string $password): User
    {
        $passwordHash = Hash::make($password);
         return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

    }
    public function findByEmail(string $email): ?User
    {
        return User::where('email', '=', $email)->first();
    }
}
