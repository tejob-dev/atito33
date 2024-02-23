<?php

namespace App\Http\Controllers\Api;

use App\Models\Quartier;
use App\Models\TypeSalle;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TypeSalleResource;
use App\Http\Resources\TypeSalleCollection;
use App\Http\Requests\TypeSalleStoreRequest;
use App\Http\Requests\TypeSalleUpdateRequest;

class TypeSalleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TypeSalle::class);

        $search = $request->get('search', '');

        $typeSalles = TypeSalle::search($search)
            ->latest()
            ->paginate();

        return new TypeSalleCollection($typeSalles);
    }

    public function api_quartiersalle(Request $request){
        $arrayOfArrays = [];
        if($request->quartier){
            $quartier = Quartier::where("nom_quartier", "like", $request->quartier);
            if($quartier){
                $typeSalles = $quartier->with("salles.typeSalles")->get()->flatMap->salles->flatMap->typeSalles->unique("id");

                $arrayOfArrays[] = (object) ["0"=>"-  -  -"];
                foreach($typeSalles as $typeSalleId){
                    $arrayOfArrays[] = (object) ["".strval($typeSalleId->libelle).""=>strval($typeSalleId->libelle)];
                }

                return new JsonResponse($arrayOfArrays);
            }

            return new JsonResponse($arrayOfArrays, 200);
        }

        return new JsonResponse($arrayOfArrays, 200);
    }

    /**
     * @param \App\Http\Requests\TypeSalleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeSalleStoreRequest $request)
    {
        $this->authorize('create', TypeSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $typeSalle = TypeSalle::create($validated);

        return new TypeSalleResource($typeSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeSalle $typeSalle)
    {
        $this->authorize('view', $typeSalle);

        return new TypeSalleResource($typeSalle);
    }

    /**
     * @param \App\Http\Requests\TypeSalleUpdateRequest $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function update(
        TypeSalleUpdateRequest $request,
        TypeSalle $typeSalle
    ) {
        $this->authorize('update', $typeSalle);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($typeSalle->photo) {
                Storage::delete($typeSalle->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $typeSalle->update($validated);

        return new TypeSalleResource($typeSalle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TypeSalle $typeSalle)
    {
        $this->authorize('delete', $typeSalle);

        if ($typeSalle->photo) {
            Storage::delete($typeSalle->photo);
        }

        $typeSalle->delete();

        return response()->noContent();
    }
}
