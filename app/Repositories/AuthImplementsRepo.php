<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepository;
use Override;

class AuthImplementsRepo implements AuthRepository{
    #[Override]
    public function create(array $data)
    {
        return User::create($data);
    }

    #[Override]
    public function findEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

}