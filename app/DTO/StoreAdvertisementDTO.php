<?php

namespace App\DTO;

readonly final class StoreAdvertisementDTO
{
    public function __construct(
        public string $title,
        public string $content,
        public int $categoryId
    ) {
    }
}
