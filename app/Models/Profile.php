<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    public function fullName(): string
    {
        $fullName = $this->firstName ?? '';
        $lastName = $this->lastName;
        if ($lastName) {
            $fullName .= ' ' . $lastName;
        }
        return $fullName;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
