<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotosSalleCollection;

class SallePhotosSallesController extends Controller
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

        $photosSalles = $salle
            ->photosSalles()
            ->search($search)
            ->latest()
            ->paginate();

        return new PhotosSalleCollection($photosSalles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Salle $salle,
        PhotosSalle $photosSalle
    ) {
        $this->authorize('update', $salle);

        $salle->photosSalles()->syncWithoutDetaching([$photosSalle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Salle $salle,
        PhotosSalle $photosSalle
    ) {
        $this->authorize('update', $salle);

        $salle->photosSalles()->detach($photosSalle);

        return response()->noContent();
    }
}
