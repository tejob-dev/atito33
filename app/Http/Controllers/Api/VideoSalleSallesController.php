<?php
namespace App\Http\Controllers\Api;

use App\Models\Salle;
use App\Models\VideoSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleCollection;

class VideoSalleSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, VideoSalle $videoSalle)
    {
        $this->authorize('view', $videoSalle);

        $search = $request->get('search', '');

        $salles = $videoSalle
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VideoSalle $videoSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        VideoSalle $videoSalle,
        Salle $salle
    ) {
        $this->authorize('update', $videoSalle);

        $videoSalle->salles()->syncWithoutDetaching([$salle->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VideoSalle $videoSalle
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        VideoSalle $videoSalle,
        Salle $salle
    ) {
        $this->authorize('update', $videoSalle);

        $videoSalle->salles()->detach($salle);

        return response()->noContent();
    }
}
