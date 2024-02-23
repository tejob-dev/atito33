<?php

namespace App\Http\Controllers\Api;

use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PhotosSalleResource;
use App\Http\Resources\PhotosSalleCollection;
use App\Http\Requests\PhotosSalleStoreRequest;
use App\Http\Requests\PhotosSalleUpdateRequest;

class PhotosSalleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PhotosSalle::class);

        $search = $request->get('search', '');

        $photosSalles = PhotosSalle::search($search)
            ->latest()
            ->paginate();

        return new PhotosSalleCollection($photosSalles);
    }

    /**
     * @param \App\Http\Requests\PhotosSalleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotosSalleStoreRequest $request)
    {
        $this->authorize('create', PhotosSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $photosSalle = PhotosSalle::create($validated);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('view', $photosSalle);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \App\Http\Requests\PhotosSalleUpdateRequest $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function update(
        PhotosSalleUpdateRequest $request,
        PhotosSalle $photosSalle
    ) {
        $this->authorize('update', $photosSalle);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($photosSalle->photo) {
                Storage::delete($photosSalle->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $photosSalle->update($validated);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('delete', $photosSalle);

        if ($photosSalle->photo) {
            Storage::delete($photosSalle->photo);
        }

        $photosSalle->delete();

        return response()->noContent();
    }
}
