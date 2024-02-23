<?php

namespace App\Http\Controllers;

use App\Models\Comodite;
use Illuminate\Http\Request;
use App\Http\Requests\ComoditeStoreRequest;
use App\Http\Requests\ComoditeUpdateRequest;

class ComoditeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Comodite::class);

        $search = $request->get('search', '');

        $comodites = Comodite::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.comodites.index', compact('comodites', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Comodite::class);

        return view('app.comodites.create');
    }

    /**
     * @param \App\Http\Requests\ComoditeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComoditeStoreRequest $request)
    {
        $this->authorize('create', Comodite::class);

        $validated = $request->validated();

        $comodite = Comodite::create($validated);

        return redirect()
            ->route('comodites.edit', $comodite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Comodite $comodite)
    {
        $this->authorize('view', $comodite);

        return view('app.comodites.show', compact('comodite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Comodite $comodite)
    {
        $this->authorize('update', $comodite);

        return view('app.comodites.edit', compact('comodite'));
    }

    /**
     * @param \App\Http\Requests\ComoditeUpdateRequest $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function update(ComoditeUpdateRequest $request, Comodite $comodite)
    {
        $this->authorize('update', $comodite);

        $validated = $request->validated();

        $comodite->update($validated);

        return redirect()
            ->route('comodites.edit', $comodite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comodite $comodite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comodite $comodite)
    {
        $this->authorize('delete', $comodite);

        $comodite->delete();

        return redirect()
            ->route('comodites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
