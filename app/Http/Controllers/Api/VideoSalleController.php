<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Salle;
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
    public function validate_videosalle(Request $request)
    {
        //$this->authorize('view-any', VideoSalle::class);

        $validated = $request->validate([
            "salleId" => ['required'],
            "videolink" => ['required', 'string'],
            "uid" => 'required|exists:users,id',
        ]);
        $salle = Salle::find($validated["salleId"]);
        $videoSalle = new \stdClass();
        if($salle){

            foreach($salle->videoSalles as $videoSalleIt){
                $videoSalleIt->delete();
            }

            $sallePhotos = $salle->photosSalles;
            $validated["lien_video"] = $request->videolink;
            $validated["salleId"] = null;
            $validated["videolink"] = null;
            $validated["uid"] = null;
            if(sizeof($sallePhotos)>0){
                $photo = $sallePhotos->first();
                $validated["photo"] = $photo->photo;
                $videoSalle = VideoSalle::create(array_filter($validated));
                $salle->videoSalles()->attach($videoSalle->id, []);
            }else{
                $validated["photo"] = "public/videophoto_def.jpg";
                $videoSalle = VideoSalle::create(array_filter($validated));
                $salle->videoSalles()->attach($videoSalle->id, []);
            }
        }
        return new VideoSalleCollection([$videoSalle]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete_videosalle(Request $request)
    {
       
        //dd($this);
        //$this->authorize('delete', PhotosSalle::find($request->photoId));
        //dd($request);
        $validated = $request->validate([
            "videoid"=>"integer",
            "salleId"=>"integer",
            "uid"=>"required|exists:users,id"
        ]);
        //dd($validated);
        $salle = null;
        if($request->uid){
            $compteid = User::where("id", $request->uid)->first()->compte;
            $salles = $compteid->salles()->where("id", $request->salleId)->get();
            //$salle = Salle::find($request->salleId);
            //dd($salle);
            if(sizeof($salles) > 0){
                //dd($salle->photosSalles()->where('id', $request->photoId)->get());
                $salle = $salles->first();
                if($salle){
                    $salle->videoSalles()->where('id', $request->videoid)->delete();
                }
            }
        }

        return new VideoSalleCollection([$salle]);
    }
    
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
