<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleCollection;

class PhotosSalleSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('view', $photosSalle);

        $search = $request->get('search', '');

        $salles = $photosSalle
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        PhotosSalle $photosSalle,
        Salle $salle
    ) {
        $this->authorize('update', $photosSalle);

        $photosSalle->salles()->syncWithoutDetaching([$salle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        PhotosSalle $photosSalle,
        Salle $salle
    ) {
        $this->authorize('update', $photosSalle);

        $photosSalle->salles()->detach($salle);

        return response()->noContent();
    }
}
