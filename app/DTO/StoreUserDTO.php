<?php

namespace App\DTO;

readonly final class StoreUserDTO
{
    public function __construct(
        public string $name,
        public string $password,
    ) {
    }
}
