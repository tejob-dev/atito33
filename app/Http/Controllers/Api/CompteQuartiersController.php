<?php
namespace App\Http\Controllers\Api;

use App\Models\Compte;
use App\Models\Quartier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuartierCollection;

class CompteQuartiersController extends Controller
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

        $quartiers = $compte
            ->quartiers()
            ->search($search)
            ->latest()
            ->paginate();

        return new QuartierCollection($quartiers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Quartier $quartier
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Compte $compte, Quartier $quartier)
    {
        $this->authorize('update', $compte);

        $compte->quartiers()->syncWithoutDetaching([$quartier->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @param \App\Models\Quartier $quartier
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Compte $compte,
        Quartier $quartier
    ) {
        $this->authorize('update', $compte);

        $compte->quartiers()->detach($quartier);

        return response()->noContent();
    }
}
