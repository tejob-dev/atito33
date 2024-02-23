<?php

namespace App\Http\Controllers\Api;

use App\Models\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Http\Resources\CommuneCollection;

class VilleCommunesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Ville $ville)
    {
        $this->authorize('view', $ville);

        $search = $request->get('search', '');

        $communes = $ville
            ->communes()
            ->search($search)
            ->latest()
            ->paginate();

        return new CommuneCollection($communes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ville $ville)
    {
        $this->authorize('create', Commune::class);

        $validated = $request->validate([
            'nom_commune' => ['required', 'max:255', 'string'],
        ]);

        $commune = $ville->communes()->create($validated);

        return new CommuneResource($commune);
    }
}
