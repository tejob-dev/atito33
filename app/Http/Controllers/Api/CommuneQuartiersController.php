<?php

namespace App\Http\Controllers\Api;

use App\Models\Commune;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuartierResource;
use App\Http\Resources\QuartierCollection;

class CommuneQuartiersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Commune $commune
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Commune $commune)
    {
        $this->authorize('view', $commune);

        $search = $request->get('search', '');

        $quartiers = $commune
            ->quartiers()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuartierCollection($quartiers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Commune $commune
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Commune $commune)
    {
        $this->authorize('create', Quartier::class);

        $validated = $request->validate([
            'nom_quartier' => ['required', 'max:255', 'string'],
        ]);

        $quartier = $commune->quartiers()->create($validated);

        return new QuartierResource($quartier);
    }
}
