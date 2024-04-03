<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArray;

enum UserRole: string
{
    use EnumToArray;

    case ADMIN = "admin";
    case USER = "user";
}
