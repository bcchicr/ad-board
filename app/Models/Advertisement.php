<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function scopeSearch(
        Builder $query,
        ?string $searchValue
    ) {
        if (is_null($searchValue)) {
            return;
        }
        $query->where('title', 'LIKE', '%' . $searchValue . '%');
    }

    public function scopeSuperCategoryFilter(
        Builder $query,
        ?string $superCategory,
    ) {
        if (is_null($superCategory)) {
            return;
        }
        $superCategory = SuperCategory::query()
            ->where('name', $superCategory)
            ->firstOrFail();
        $categories = $superCategory->categories;
        $query->whereBelongsTo($categories);
    }

    public function scopeCategoryFilter(
        Builder $query,
        ?string $category,
    ) {
        if (is_null($category)) {
            return;
        }
        $category = Category::query()
            ->where('name', $category)
            ->firstOrFail();
        $query->whereBelongsTo($category);
    }


    public function scopePublished(Builder $query)
    {
        $query->whereNotNull('published_at');
    }
    public function scopeWaiting(Builder $query)
    {
        $query->whereNull('published_at');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
