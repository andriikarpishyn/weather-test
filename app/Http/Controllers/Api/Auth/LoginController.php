<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json('Login or password incorrect', Response::HTTP_FORBIDDEN);
        }

        $user = User::query()
            ->where('email', $request->email)
            ->first();

        $token = $user->createToken('login token');

        return response()->json(['token' => $token->plainTextToken]);
    }
}
