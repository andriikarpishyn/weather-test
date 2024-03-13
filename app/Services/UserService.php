<?php

namespace App\Services;

use App\DTO\UserData;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        protected UserRepository $userRepository
    )
    {
    }

    public static function createToken()
    {
        $token = auth()->user()->createToken('login token');
        return $token->plainTextToken;
    }

    public function store(UserData $userData)
    {
        return $this->userRepository->store($userData);
    }
}
