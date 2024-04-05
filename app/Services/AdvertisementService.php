<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Advertisement;
use App\DTO\StoreAdvertisementDTO;
use Illuminate\Support\Facades\Auth;
use App\DTO\GetPublishedAdvertisementsDTO;
use Illuminate\Support\Facades\Storage;

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

        if (null !== $request->picture) {
            $path = $request->picture->storeAs(
                sprintf(
                    'uploads/images/advertisements/%s/%s',
                    $advertisement->user->name,
                    date('Y-m'),
                ),
                sprintf(
                    '%s.%s',
                    Str::uuid()->toString(),
                    $request->picture->extension()
                ),
                'public'
            );
            $advertisement->image_path = $path;
        }

        return $advertisement->save();
    }
    public function getPublished(GetPublishedAdvertisementsDTO $request)
    {
        return Advertisement::query()
            ->published()
            ->superCategoryFilter($request->superCategory)
            ->categoryFilter($request->category)
            ->search($request->search)
            ->latest('published_at');
    }
    public function getWaiting()
    {
        return Advertisement::query()
            ->waiting()
            ->latest();
    }
    public function publish(int $id): bool
    {
        $advertisement = Advertisement::query()
            ->find($id);
        if (!$advertisement) {
            return false;
        }

        $advertisement->published_at = now();
        return $advertisement->save();
    }
    public function destroy(int $id): bool
    {
        $advertisement = Advertisement::query()
            ->find($id);
        if (!$advertisement) {
            return false;
        }
        $path = $advertisement->image_path;
        Storage::disk('public')->delete($path);
        return $advertisement->delete();
    }
}
