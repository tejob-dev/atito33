<?php
namespace App\Http\Controllers\Api;

use App\Models\Ville;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VilleCollection;

class CompteVillesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Compte $compte)
    {
        $this->authorize('view', $compte);

        $search = $request->get('search', '');

        $villes = $compte
            ->villes()
            ->search($search)
            ->latest()
            ->paginate();

        return new VilleCollection($villes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Compte $compte, Ville $ville)
    {
        $this->authorize('update', $compte);

        $compte->villes()->syncWithoutDetaching([$ville->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Compte $compte, Ville $ville)
    {
        $this->authorize('update', $compte);

        $compte->villes()->detach($ville);

        return response()->noContent();
    }
}
