<?php

namespace App\Http\Controllers;

use App\Models\TexteJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TexteJourStoreRequest;
use App\Http\Requests\TexteJourUpdateRequest;

class TexteJourController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', TexteJour::class);

        $search = $request->get('search', '');

        $texteJours = TexteJour::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.texte_jours.index', compact('texteJours', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', TexteJour::class);

        return view('app.texte_jours.create');
    }

    /**
     * @param \App\Http\Requests\TexteJourStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TexteJourStoreRequest $request)
    {
        $this->authorize('create', TexteJour::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $texteJour = TexteJour::create($validated);

        return redirect()
            ->route('texte-jours.edit', $texteJour)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TexteJour $texteJour)
    {
        $this->authorize('view', $texteJour);

        return view('app.texte_jours.show', compact('texteJour'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TexteJour $texteJour)
    {
        $this->authorize('update', $texteJour);

        return view('app.texte_jours.edit', compact('texteJour'));
    }

    /**
     * @param \App\Http\Requests\TexteJourUpdateRequest $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function update(
        TexteJourUpdateRequest $request,
        TexteJour $texteJour
    ) {
        $this->authorize('update', $texteJour);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            if ($texteJour->photo) {
                Storage::delete($texteJour->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $texteJour->update($validated);

        return redirect()
            ->route('texte-jours.edit', $texteJour)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TexteJour $texteJour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TexteJour $texteJour)
    {
        $this->authorize('delete', $texteJour);

        if ($texteJour->photo) {
            Storage::delete($texteJour->photo);
        }

        $texteJour->delete();

        return redirect()
            ->route('texte-jours.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
