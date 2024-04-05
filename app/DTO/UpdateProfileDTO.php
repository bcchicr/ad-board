<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

readonly final class UpdateProfileDTO
{
    public function __construct(
        public ?string $firstName,
        public ?string $lastName,
        public ?string $phone,
        public ?string $bio,
        public ?UploadedFile $avatar
    ) {
    }
}
