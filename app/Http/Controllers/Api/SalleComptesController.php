<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompteCollection;

class SalleComptesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Salle $salle)
    {
        $this->authorize('view', $salle);

        $search = $request->get('search', '');

        $comptes = $salle
            ->comptes()
            ->search($search)
            ->latest()
            ->paginate();

        return new CompteCollection($comptes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Salle $salle, Compte $compte)
    {
        $this->authorize('update', $salle);

        $salle->comptes()->syncWithoutDetaching([$compte->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salle $salle, Compte $compte)
    {
        $this->authorize('update', $salle);

        $salle->comptes()->detach($compte);

        return response()->noContent();
    }
}
