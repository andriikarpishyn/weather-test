<?php

namespace App\Http\Controllers\Api\Auth;

use App\DTO\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SocialRegisterRequest;
use App\Services\RegisterService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialRegisterController extends Controller
{
    public function __construct(
        protected RegisterService $registerService
    )
    {
    }

    public function redirect(SocialRegisterRequest $request): JsonResponse
    {
        config(["services.google.redirect" => url("/api/register/callback")]);

        $url = Socialite::driver($request->provider)
            ->stateless()
            ->redirect()
            ->getTargetUrl();

        return response()->json(['url' => $url]);
    }

    public function callback(): JsonResponse
    {
        config(["services.google.redirect" => url("/api/register/callback")]);

        $user = Socialite::driver('google')->stateless()->user();

        $userData = new UserData(
            $user->user['given_name'],
            $user->user['family_name'],
            $user->getEmail()
        );

        $this->registerService->loginOrRegister($userData);

        $token = UserService::createToken();

        return response()->json(compact(['token']));
    }
}
