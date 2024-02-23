<?php
namespace App\Http\Controllers\Api;

use App\Models\Ville;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompteCollection;

class VilleComptesController extends Controller
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

        $comptes = $ville
            ->comptes()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompteCollection($comptes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ville $ville, Compte $compte)
    {
        $this->authorize('update', $ville);

        $ville->comptes()->syncWithoutDetaching([$compte->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ville $ville, Compte $compte)
    {
        $this->authorize('update', $ville);

        $ville->comptes()->detach($compte);

        return response()->noContent();
    }
}
