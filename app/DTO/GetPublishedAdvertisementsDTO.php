<?php

namespace App\DTO;

readonly final class GetPublishedAdvertisementsDTO
{
    public function __construct(
        public ?string $superCategory,
        public ?string $category
    ) {
    }
}
