<?php

namespace App\Http\Controllers\Api;

use App\Models\TexteJour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TexteJourResource;
use App\Http\Resources\TexteJourCollection;
use App\Http\Requests\TexteJourStoreRequest;
use App\Http\Requests\TexteJourUpdateRequest;

class TexteJourController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TexteJour::class);

        $search = $request->get('search', '');

        $texteJours = TexteJour::search($search)
            ->latest()
            ->paginate();

        return new TexteJourCollection($texteJours);
    }

    /**
     * @param \App\Http\Requests\TexteJourStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TexteJourStoreRequest $request)
    {
        $this->authorize('create', TexteJour::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $texteJour = TexteJour::create($validated);

        return new TexteJourResource($texteJour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TexteJour $texteJour)
    {
        $this->authorize('view', $texteJour);

        return new TexteJourResource($texteJour);
    }

    /**
     * @param \App\Http\Requests\TexteJourUpdateRequest $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function update(
        TexteJourUpdateRequest $request,
        TexteJour $texteJour
    ) {
        $this->authorize('update', $texteJour);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($texteJour->photo) {
                Storage::delete($texteJour->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $texteJour->update($validated);

        return new TexteJourResource($texteJour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TexteJour $texteJour)
    {
        $this->authorize('delete', $texteJour);

        if ($texteJour->photo) {
            Storage::delete($texteJour->photo);
        }

        $texteJour->delete();

        return response()->noContent();
    }
}
