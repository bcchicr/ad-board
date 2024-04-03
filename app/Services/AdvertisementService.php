<?php

namespace App\Services;

use App\DTO\StoreAdvertisementDTO;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;

final class AdvertisementService
{
    public function store(StoreAdvertisementDTO $request): bool
    {
        $category = Category::query()
            ->findOrFail($request->categoryId);

        $advertisement = new Advertisement();
        $advertisement->title = $request->title;
        $advertisement->content = $request->content;
        $advertisement->category()->associate($category);

        $advertisement->user()->associate(User::all()->random());

        return $advertisement->save();
    }
}
