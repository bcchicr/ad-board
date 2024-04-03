<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Advertisement;
use App\DTO\StoreAdvertisementDTO;
use Illuminate\Support\Facades\Auth;
use App\DTO\GetPublishedAdvertisementsDTO;

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

        $advertisement->user()->associate(Auth::user());

        return $advertisement->save();
    }
    public function getPublished(GetPublishedAdvertisementsDTO $request)
    {
        $searchValue = $request->search;
        $categoryId = $request->categoryId;
        $superCategoryId = $request->superCategoryId;

        return Advertisement::query()
            ->published()
            ->search($searchValue)
            ->superCategoryFilter($superCategoryId)
            ->categoryFilter($request->categoryId)
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }
}
