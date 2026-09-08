<?php
namespace App\Repositories\Interfaces;

interface AuthRepository {
    public function create(array $data);
    public function findEmail(string $email);
}