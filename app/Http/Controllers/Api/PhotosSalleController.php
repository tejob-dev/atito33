<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Salle;
use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Resources\SalleResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PhotosSalleResource;
use App\Http\Resources\PhotosSalleCollection;
use App\Http\Requests\PhotosSalleStoreRequest;
use App\Http\Requests\PhotosSalleUpdateRequest;

class PhotosSalleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render_photo_salle(Request $request)
    {
        $salle = null;

        if($request->salle_id){
            $salle = Salle::find($request->salle_id);
        }

        $content = "";

        if($salle){
            $photosSalles = $salle->photosSalles;
            $salle_id = $salle->id;
            $authuser = $request->u_id;
            //dd($photosSalles);
            $content = View::make("useradmin.gallery-photo-model", compact("photosSalles", "salle_id", "authuser"))->render();
        }
        return $content;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render_video_salle(Request $request)
    {
        $salle = null;

        if($request->salle_id){
            $salle = Salle::find($request->salle_id);
        }

        $content = "";

        if($salle){
            $videoSalles = $salle->videoSalles;
            $salle_id = $salle->id;
            $authuser = $request->u_id;
            //dd($photosSalles);
            $content = View::make("useradmin.salle-video-model", compact("videoSalles", "salle_id", "authuser"))->render();
        }
        return $content;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload_photosalle(Request $request)
    {
       
        //$this->authorize('create', PhotosSalle::class);
        //dd($request);
        $validated = $request->validate([
            "photosalle"=>"file|mimes:jpeg,bmp,png",
            "salleid"=>"integer"
        ]);
        //dd($validated);
        if ($request->hasFile('photosalle')) {
            $validated['photo'] = $request->file('photosalle')->store('public');
        }
        $photosSalle = null;
        if($request->salleid){
            $validated["salle_id"] = "";
            $validated["titre_image"] = $request->photosalle_name;
            $validated["description_image"] = "Pas de description";
            $validated['salleid'] = null;
            $validated['photosalle'] = null;
            $salle = Salle::find($request->salleid);
            //dd($salle);
            if(!empty($salle)){
                $photosSalle = PhotosSalle::create(array_filter($validated));
                $salle->photosSalles()->attach($photosSalle->id, []);
            }
        }

        return new PhotosSalleResource($photosSalle);
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete_photosalle(Request $request)
    {
       
        //dd($this);
        //$this->authorize('delete', PhotosSalle::find($request->photoId));
        //dd($request);
        $validated = $request->validate([
            "photoId"=>"integer",
            "salleId"=>"integer"
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
                    $salle->photosSalles()->where('id', $request->photoId)->delete();
                }
            }
        }

        return new SalleResource([optional($salle)->id]);
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PhotosSalle::class);

        $search = $request->get('search', '');

        $photosSalles = PhotosSalle::search($search)
            ->latest()
            ->paginate();

        return new PhotosSalleCollection($photosSalles);
    }

    /**
     * @param \App\Http\Requests\PhotosSalleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotosSalleStoreRequest $request)
    {
        $this->authorize('create', PhotosSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $photosSalle = PhotosSalle::create($validated);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('view', $photosSalle);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \App\Http\Requests\PhotosSalleUpdateRequest $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function update(
        PhotosSalleUpdateRequest $request,
        PhotosSalle $photosSalle
    ) {
        $this->authorize('update', $photosSalle);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($photosSalle->photo) {
                Storage::delete($photosSalle->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $photosSalle->update($validated);

        return new PhotosSalleResource($photosSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PhotosSalle $photosSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PhotosSalle $photosSalle)
    {
        $this->authorize('delete', $photosSalle);

        if ($photosSalle->photo) {
            Storage::delete($photosSalle->photo);
        }

        $photosSalle->delete();

        return response()->noContent();
    }
}
