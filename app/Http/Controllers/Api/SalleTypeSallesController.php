<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\TypeSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeSalleCollection;

class SalleTypeSallesController extends Controller
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

        $typeSalles = $salle
            ->typeSalles()
            ->search($search)
            ->latest()
            ->paginate();

        return new TypeSalleCollection($typeSalles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Salle $salle, TypeSalle $typeSalle)
    {
        $this->authorize('update', $salle);

        $salle->typeSalles()->syncWithoutDetaching([$typeSalle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Salle $salle,
        TypeSalle $typeSalle
    ) {
        $this->authorize('update', $salle);

        $salle->typeSalles()->detach($typeSalle);

        return response()->noContent();
    }
}
