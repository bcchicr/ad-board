<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\SuperCategory;
use Illuminate\Support\Facades\Auth;
use App\Services\AdvertisementService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\GetPublishedAdvertisementsRequest;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        GetPublishedAdvertisementsRequest $request,
        AdvertisementService $advertisementService,
    ) {
        $advertisements = $advertisementService
            ->getPublished($request->getDTO())
            ->paginate(15);

        return view('advertisements.index', compact(
            'advertisements',
        ));
    }

    public function waiting()
    {
        $advertisements = Advertisement::query()
            ->waiting()
            ->latest()
            ->paginate(15);
        return view('advertisements.waiting', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $superCategories = SuperCategory::all();
        return view('advertisements.create', compact('superCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreAdvertisementRequest $request,
        AdvertisementService $advertisementService
    ) {
        if (!$advertisementService->store($request->getDTO())) {
            return redirect()->back();
        }
        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        Session::keep('previous-url');
        /**
         * @var ?App\Models\User $user
         */
        $user = Auth::user();
        if (!$advertisement->isPublished() && !$user?->isAdmin()) {
            abort(404);
        }
        return view('advertisements.show', compact('advertisement'));
    }

    public function publish(
        string $id,
        AdvertisementService $advertisementService
    ) {
        Session::keep('previous-url');
        if (!$advertisementService->publish($id)) {
            return redirect()->back()->withErrors([
                'controls' => 'Не удалось опубликовать объявление'
            ]);
        }
        return redirect()->route('ads.waiting');
    }
    public function decline(
        string $id,
        AdvertisementService $advertisementService
    ) {
        Session::keep('previous-url');
        if (!$advertisementService->destroy($id)) {
            return redirect()->back()->withErrors([
                'controls' => 'Не удалось отклонить объявление'
            ]);
        }
        return redirect()->route('ads.waiting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        string $id,
        AdvertisementService $advertisementService
    ) {
        Session::keep('previous-url');
        if (!$advertisementService->destroy($id)) {
            return redirect()->back()->withErrors([
                'controls' => 'Не удалось удалить объявление'
            ]);
        }
        return redirect()->route('ads.index');
    }
}
