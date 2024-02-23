<?php

namespace App\Http\Controllers\Api;

use App\Models\Comodite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComoditeResource;
use App\Http\Resources\ComoditeCollection;
use App\Http\Requests\ComoditeStoreRequest;
use App\Http\Requests\ComoditeUpdateRequest;

class ComoditeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Comodite::class);

        $search = $request->get('search', '');

        $comodites = Comodite::search($search)
            ->latest()
            ->paginate();

        return new ComoditeCollection($comodites);
    }

    /**
     * @param \App\Http\Requests\ComoditeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComoditeStoreRequest $request)
    {
        $this->authorize('create', Comodite::class);

        $validated = $request->validated();

        $comodite = Comodite::create($validated);

        return new ComoditeResource($comodite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Comodite $comodite)
    {
        $this->authorize('view', $comodite);

        return new ComoditeResource($comodite);
    }

    /**
     * @param \App\Http\Requests\ComoditeUpdateRequest $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function update(ComoditeUpdateRequest $request, Comodite $comodite)
    {
        $this->authorize('update', $comodite);

        $validated = $request->validated();

        $comodite->update($validated);

        return new ComoditeResource($comodite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comodite $comodite)
    {
        $this->authorize('delete', $comodite);

        $comodite->delete();

        return response()->noContent();
    }
}
