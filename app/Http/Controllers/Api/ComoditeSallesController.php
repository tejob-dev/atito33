<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\Comodite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleCollection;

class ComoditeSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Comodite $comodite)
    {
        $this->authorize('view', $comodite);

        $search = $request->get('search', '');

        $salles = $comodite
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comodite $comodite, Salle $salle)
    {
        $this->authorize('update', $comodite);

        $comodite->salles()->syncWithoutDetaching([$salle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comodite $comodite, Salle $salle)
    {
        $this->authorize('update', $comodite);

        $comodite->salles()->detach($salle);

        return response()->noContent();
    }
}
