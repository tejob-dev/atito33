<?php

namespace App\Http\Controllers\Api;

use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompteResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CompteCollection;
use App\Http\Requests\CompteStoreRequest;
use App\Http\Requests\CompteUpdateRequest;

class CompteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Compte::class);

        $search = $request->get('search', '');

        $comptes = Compte::search($search)
            ->latest()
            ->paginate();

        return new CompteCollection($comptes);
    }

    /**
     * @param \App\Http\Requests\CompteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompteStoreRequest $request)
    {
        $this->authorize('create', Compte::class);

        $validated = $request->validated();
        if ($request->hasFile('logo_entreprise')) {
            $validated['logo_entreprise'] = $request
                ->file('logo_entreprise')
                ->store('public');
        }

        $compte = Compte::create($validated);

        return new CompteResource($compte);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Compte $compte)
    {
        $this->authorize('view', $compte);

        return new CompteResource($compte);
    }

    /**
     * @param \App\Http\Requests\CompteUpdateRequest $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function update(CompteUpdateRequest $request, Compte $compte)
    {
        $this->authorize('update', $compte);

        $validated = $request->validated();

        if ($request->hasFile('logo_entreprise')) {
            if ($compte->logo_entreprise) {
                Storage::delete($compte->logo_entreprise);
            }

            $validated['logo_entreprise'] = $request
                ->file('logo_entreprise')
                ->store('public');
        }

        $compte->update($validated);

        return new CompteResource($compte);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Compte $compte)
    {
        $this->authorize('delete', $compte);

        if ($compte->logo_entreprise) {
            Storage::delete($compte->logo_entreprise);
        }

        $compte->delete();

        return response()->noContent();
    }
}
