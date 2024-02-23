<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\Comodite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComoditeCollection;

class SalleComoditesController extends Controller
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

        $comodites = $salle
            ->comodites()
            ->search($search)
            ->latest()
            ->paginate();

        return new ComoditeCollection($comodites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Salle $salle, Comodite $comodite)
    {
        $this->authorize('update', $salle);

        $salle->comodites()->syncWithoutDetaching([$comodite->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salle $salle, Comodite $comodite)
    {
        $this->authorize('update', $salle);

        $salle->comodites()->detach($comodite);

        return response()->noContent();
    }
}
