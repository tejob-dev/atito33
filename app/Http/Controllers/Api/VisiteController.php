<?php

namespace App\Http\Controllers\Api;

use App\Models\Visite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisiteResource;
use App\Http\Resources\VisiteCollection;
use App\Http\Requests\VisiteStoreRequest;
use App\Http\Requests\VisiteUpdateRequest;

class VisiteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Visite::class);

        $search = $request->get('search', '');

        $visites = Visite::search($search)
            ->latest()
            ->paginate();

        return new VisiteCollection($visites);
    }

    /**
     * @param \App\Http\Requests\VisiteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisiteStoreRequest $request)
    {
        $this->authorize('create', Visite::class);

        $validated = $request->validated();

        $visite = Visite::create($validated);

        return new VisiteResource($visite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visite $visite)
    {
        $this->authorize('view', $visite);

        return new VisiteResource($visite);
    }

    /**
     * @param \App\Http\Requests\VisiteUpdateRequest $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function update(VisiteUpdateRequest $request, Visite $visite)
    {
        $this->authorize('update', $visite);

        $validated = $request->validated();

        $visite->update($validated);

        return new VisiteResource($visite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Visite $visite)
    {
        $this->authorize('delete', $visite);

        $visite->delete();

        return response()->noContent();
    }
}
