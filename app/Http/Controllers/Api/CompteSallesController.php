<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleCollection;

class CompteSallesController extends Controller
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

        $salles = $compte
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Compte $compte, Salle $salle)
    {
        $this->authorize('update', $compte);

        $compte->salles()->syncWithoutDetaching([$salle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Compte $compte, Salle $salle)
    {
        $this->authorize('update', $compte);

        $compte->salles()->detach($salle);

        return response()->noContent();
    }
}
