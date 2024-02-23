<?php
namespace App\Http\Controllers\Api;

use App\Models\Compte;
use App\Models\Quartier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompteCollection;

class QuartierComptesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quartier $quartier
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Quartier $quartier)
    {
        $this->authorize('view', $quartier);

        $search = $request->get('search', '');

        $comptes = $quartier
            ->comptes()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompteCollection($comptes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quartier $quartier
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quartier $quartier, Compte $compte)
    {
        $this->authorize('update', $quartier);

        $quartier->comptes()->syncWithoutDetaching([$compte->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quartier $quartier
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Quartier $quartier,
        Compte $compte
    ) {
        $this->authorize('update', $quartier);

        $quartier->comptes()->detach($compte);

        return response()->noContent();
    }
}
