<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class SuperCategory extends Model
{
    use HasFactory;

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function advertisements(): HasManyThrough
    {
        return $this->hasManyThrough(Advertisement::class, Category::class);
    }
}
