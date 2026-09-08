<?php
namespace App\Services;

use App\Repositories\Interfaces\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService{
    protected $authRepo;

    public function __construct(AuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    
    public function register(array $data){
        $data['password'] = Hash::make($data['password']);
        $user = $this->authRepo->create($data);
        $token = $user->createToken('auth')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $data){
       $user = $this->authRepo->findEmail($data['email']);

       if(!$user || Hash::check($data['email'], $user->password)){
         throw ValidationException::withMessages([
            'email' => ['email tidak cocok']
         ]);
       }

       $token = $user->createToken('auth')->plainTextToken;

       return[
            'user' => $user,
            'token' => $token
       ];
    }
}