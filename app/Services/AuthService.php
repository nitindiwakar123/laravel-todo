<?php
namespace App\Services;

use App\Models\User;

class AuthService {
    public function createUser(array $data): User {
        $user = User::create($data);

        return $user;
    }
}