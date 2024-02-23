<?php

namespace App\Http\Controllers;

use App\Models\TypeSalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.type_salles.index', compact('typeSalles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TypeSalle::class);

        return view('app.type_salles.create');
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

        return redirect()
            ->route('type-salles.edit', $typeSalle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TypeSalle $typeSalle)
    {
        $this->authorize('view', $typeSalle);

        return view('app.type_salles.show', compact('typeSalle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TypeSalle $typeSalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TypeSalle $typeSalle)
    {
        $this->authorize('update', $typeSalle);

        return view('app.type_salles.edit', compact('typeSalle'));
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

        return redirect()
            ->route('type-salles.edit', $typeSalle)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('type-salles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
