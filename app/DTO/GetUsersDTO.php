<?php

namespace App\DTO;

readonly final class GetUsersDTO
{
    public function __construct(
        public ?string $search,
    ) {
    }
}
