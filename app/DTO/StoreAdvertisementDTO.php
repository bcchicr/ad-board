<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

readonly final class StoreAdvertisementDTO
{
    public function __construct(
        public string $title,
        public string $content,
        public int $categoryId,
        public ?UploadedFile $picture
    ) {
    }
}
