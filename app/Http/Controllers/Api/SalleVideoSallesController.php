<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\VideoSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoSalleCollection;

class SalleVideoSallesController extends Controller
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

        $videoSalles = $salle
            ->videoSalles()
            ->search($search)
            ->latest()
            ->paginate();

        return new VideoSalleCollection($videoSalles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Salle $salle,
        VideoSalle $videoSalle
    ) {
        $this->authorize('update', $salle);

        $salle->videoSalles()->syncWithoutDetaching([$videoSalle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Salle $salle,
        VideoSalle $videoSalle
    ) {
        $this->authorize('update', $salle);

        $salle->videoSalles()->detach($videoSalle);

        return response()->noContent();
    }
}
