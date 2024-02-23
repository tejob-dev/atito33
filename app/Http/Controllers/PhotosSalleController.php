<?php

namespace App\Http\Controllers;

use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.photos_salles.index',
            compact('photosSalles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PhotosSalle::class);

        return view('app.photos_salles.create');
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

        return redirect()
            ->route('photos-salles.edit', $photosSalle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('view', $photosSalle);

        return view('app.photos_salles.show', compact('photosSalle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('update', $photosSalle);

        return view('app.photos_salles.edit', compact('photosSalle'));
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

        return redirect()
            ->route('photos-salles.edit', $photosSalle)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('photos-salles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
