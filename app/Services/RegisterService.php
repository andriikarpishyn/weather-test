<?php

namespace App\Services;

use App\DTO\UserData;
use App\Enums\SocialProviderEnum;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegisterService
{
    public function __construct(
        protected UserRepository $userRepository
    )
    {
    }

    public function loginOrRegister(UserData $userData): void
    {
        $userId = $this->userRepository->getIdByEmail($userData->email);

        if (!$userId) {
            $userId = $this->userRepository->store($userData);
        }

        $this->loginById($userId);
    }

    public function loginById(int $id): void
    {
        Auth::loginUsingId($id);
    }
}
