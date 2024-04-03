<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetPublishedAdvertisementsRequest;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\SuperCategory;
use App\Services\AdvertisementService;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        GetPublishedAdvertisementsRequest $request,
        AdvertisementService $advertisementService
    ) {
        $advertisements = $advertisementService->getPublished($request->getDTO());

        return view('advertisements.index', [
            'advertisements' => $advertisements,
            'searchValue' => $request->input('search'),
            'superCategoryId' => $request->input('category-id'),
            'categoryId' => $request->input('category'),
        ]);
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
        return view('advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
