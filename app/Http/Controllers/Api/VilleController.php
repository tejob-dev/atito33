<?php

namespace App\Http\Controllers\Api;

use App\Models\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VilleResource;
use App\Http\Resources\VilleCollection;
use App\Http\Requests\VilleStoreRequest;
use App\Http\Requests\VilleUpdateRequest;

class VilleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Ville::class);

        $search = $request->get('search', '');

        $villes = Ville::search($search)
            ->latest()
            ->paginate();

        return new VilleCollection($villes);
    }

    /**
     * @param \App\Http\Requests\VilleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VilleStoreRequest $request)
    {
        $this->authorize('create', Ville::class);

        $validated = $request->validated();

        $ville = Ville::create($validated);

        return new VilleResource($ville);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ville $ville)
    {
        $this->authorize('view', $ville);

        return new VilleResource($ville);
    }

    /**
     * @param \App\Http\Requests\VilleUpdateRequest $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function update(VilleUpdateRequest $request, Ville $ville)
    {
        $this->authorize('update', $ville);

        $validated = $request->validated();

        $ville->update($validated);

        return new VilleResource($ville);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ville $ville)
    {
        $this->authorize('delete', $ville);

        $ville->delete();

        return response()->noContent();
    }
}
