<?php

namespace App\Enums;

enum UserStatusEnum: int
{
    case ACTIVE = 1;
    case DISABLED = 2;

    public function name()
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::DISABLED => 'Disabled'
        };
    }
}
