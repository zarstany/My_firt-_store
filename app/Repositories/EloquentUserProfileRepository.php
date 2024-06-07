<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class EloquentUserProfileRepository
{
    public function store(int $userId): void
    {
       UserProfile::create([
         'user_id' => $userId,
          'profile_id' => User::CLIENT
       ]);
    }
 
}
