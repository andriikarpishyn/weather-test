<?php

namespace App\Http\Controllers\Web\Auth;

use App\DTO\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Services\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(protected RegisterService $registerService)
    {
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $userData = new UserData(...$request->validated());
        $this->registerService->loginOrRegister($userData);
        return redirect(RouteServiceProvider::HOME);
    }
}
