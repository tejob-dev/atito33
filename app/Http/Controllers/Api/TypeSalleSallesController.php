<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\TypeSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleCollection;

class TypeSalleSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TypeSalle $typeSalle)
    {
        $this->authorize('view', $typeSalle);

        $search = $request->get('search', '');

        $salles = $typeSalle
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TypeSalle $typeSalle, Salle $salle)
    {
        $this->authorize('update', $typeSalle);

        $typeSalle->salles()->syncWithoutDetaching([$salle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        TypeSalle $typeSalle,
        Salle $salle
    ) {
        $this->authorize('update', $typeSalle);

        $typeSalle->salles()->detach($salle);

        return response()->noContent();
    }
}
