<?php

namespace App\Repositories;

use App\DTO\UserData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function getIdByEmail(string $email): null|int
    {
        $user = DB::table('users')
            ->select('id')
            ->where('email', $email)
            ->first();

        return $user->id ?? null;
    }

    public function store(UserData $userData): int
    {
        DB::table('users')->insert([
            'first_name' => $userData->first_name,
            'last_name' => $userData->last_name,
            'email' => $userData->email,
            'password' => Hash::make($userData->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return DB::getPdo()->lastInsertId();
    }

}
