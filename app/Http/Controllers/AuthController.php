<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Exception;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request){
        try{
            $validator = $request->validated();

            $result = $this->authService->register($validator);

            return response()->json([
                'status' => 'login berhasil',
                'user' => $result['user'],
                'token' => $result['token'],
                'type' => 'bearer'
            ], 201);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function login(LoginRequest $request){
        try{
            $validator = $request->validated();
    
            $result = $this->authService->login($validator);
    
            return response()->json([
                'status' => 'login behasl',
                'user' => $result['user'],
                'token' => $result['token'],
                'type' => 'bearer'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
