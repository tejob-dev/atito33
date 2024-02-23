<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\Visite;
use Illuminate\Http\Request;
use App\Http\Requests\VisiteStoreRequest;
use App\Http\Requests\VisiteUpdateRequest;

class VisiteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Visite::class);

        $search = $request->get('search', '');

        $visites = Visite::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.visites.index', compact('visites', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Visite::class);

        $salles = Salle::pluck('nom_salle', 'id');

        return view('app.visites.create', compact('salles'));
    }

    /**
     * @param \App\Http\Requests\VisiteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisiteStoreRequest $request)
    {
        $this->authorize('create', Visite::class);

        $validated = $request->validated();

        $visite = Visite::create($validated);

        return redirect()
            ->route('visites.edit', $visite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visite $visite)
    {
        $this->authorize('view', $visite);

        return view('app.visites.show', compact('visite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Visite $visite)
    {
        $this->authorize('update', $visite);

        $salles = Salle::pluck('type', 'id');

        return view('app.visites.edit', compact('visite', 'salles'));
    }

    /**
     * @param \App\Http\Requests\VisiteUpdateRequest $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function update(VisiteUpdateRequest $request, Visite $visite)
    {
        $this->authorize('update', $visite);

        $validated = $request->validated();

        $visite->update($validated);

        return redirect()
            ->route('visites.edit', $visite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visite $visite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Visite $visite)
    {
        $this->authorize('delete', $visite);

        $visite->delete();

        return redirect()
            ->route('visites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
