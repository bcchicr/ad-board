<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'role' => UserRole::class
        ];
    }
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function scopeSearch(
        Builder $query,
        ?string $searchValue
    ) {
        if (is_null($searchValue)) {
            return;
        }
        $query->where('name', 'LIKE', '%' . $searchValue . '%');
    }

    public function advertisements(): HasMany
    {
        return $this->hasMany(Advertisement::class);
    }
    public function advertisementsPublished(): HasMany
    {
        return $this->hasMany(Advertisement::class)->published();
    }
}
