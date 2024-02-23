<?php

namespace App\Http\Controllers\Api;

use App\Models\VideoSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\VideoSalleResource;
use App\Http\Resources\VideoSalleCollection;
use App\Http\Requests\VideoSalleStoreRequest;
use App\Http\Requests\VideoSalleUpdateRequest;

class VideoSalleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', VideoSalle::class);

        $search = $request->get('search', '');

        $videoSalles = VideoSalle::search($search)
            ->latest()
            ->paginate();

        return new VideoSalleCollection($videoSalles);
    }

    /**
     * @param \App\Http\Requests\VideoSalleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoSalleStoreRequest $request)
    {
        $this->authorize('create', VideoSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $videoSalle = VideoSalle::create($validated);

        return new VideoSalleResource($videoSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, VideoSalle $videoSalle)
    {
        $this->authorize('view', $videoSalle);

        return new VideoSalleResource($videoSalle);
    }

    /**
     * @param \App\Http\Requests\VideoSalleUpdateRequest $request
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function update(
        VideoSalleUpdateRequest $request,
        VideoSalle $videoSalle
    ) {
        $this->authorize('update', $videoSalle);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($videoSalle->photo) {
                Storage::delete($videoSalle->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $videoSalle->update($validated);

        return new VideoSalleResource($videoSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\VideoSalle $videoSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, VideoSalle $videoSalle)
    {
        $this->authorize('delete', $videoSalle);

        if ($videoSalle->photo) {
            Storage::delete($videoSalle->photo);
        }

        $videoSalle->delete();

        return response()->noContent();
    }
}
