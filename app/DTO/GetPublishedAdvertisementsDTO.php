<?php

namespace App\DTO;

readonly final class GetPublishedAdvertisementsDTO
{
    public function __construct(
        public ?string $search,
        public ?string $categoryId,
        public ?string $superCategoryId,
    ) {
    }
}
