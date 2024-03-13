<?php

namespace App\Http\Controllers\Web\Auth;

use App\DTO\UserData;
use App\Enums\SocialProviderEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SocialRegisterRequest;
use App\Services\RegisterService;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\RedirectResponse as ToRouteResponse;

class SocialRegisterController extends Controller
{
    public function __construct(
        protected RegisterService $registerService
    )
    {
    }

    public function redirect(SocialRegisterRequest $request): RedirectResponse
    {
        $provider = SocialProviderEnum::tryFrom($request->provider);
        return Socialite::driver($provider->value)->redirect();
    }

    public function callback(): ToRouteResponse
    {

        $user = Socialite::driver(SocialProviderEnum::GOOGLE->value)->stateless()->user();

        $userData = new UserData(
            $user->user['given_name'],
            $user->user['family_name'],
            $user->getEmail()
        );

        $this->registerService->loginOrRegister($userData);

        return to_route('home');
    }
}
