<?php

namespace App\Http\Controllers\Api\Auth;

use App\DTO\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SocialRegisterRequest;
use App\Services\RegisterService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function __construct(
        protected RegisterService $registerService
    )
    {
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        $userData = new UserData(...$request->validated());

        $this->registerService->loginOrRegister($userData);

        $token = UserService::createToken();

        return response()->json(compact('token'));
    }
}
