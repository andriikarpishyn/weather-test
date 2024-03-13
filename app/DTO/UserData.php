<?php

namespace App\DTO;

readonly class UserData
{
    public function __construct(
        public string      $first_name,
        public null|string $last_name,
        public string      $email,
        public null|string $password = null
    )
    {
    }
}
