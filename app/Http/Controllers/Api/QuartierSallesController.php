<?php

namespace App\Http\Controllers\Api;

use App\Models\Quartier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleResource;
use App\Http\Resources\SalleCollection;

class QuartierSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quartier $quartier
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Quartier $quartier)
    {
        $this->authorize('view', $quartier);

        $search = $request->get('search', '');

        $salles = $quartier
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Quartier $quartier
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quartier $quartier)
    {
        $this->authorize('create', Salle::class);

        $validated = $request->validate([
            'type' => ['nullable', 'max:255', 'string'],
            'nom_salle' => ['required', 'max:255', 'string'],
            'adresse_salle' => ['required', 'max:255', 'string'],
            'presentation_salle' => ['nullable', 'string'],
            'capacite_salle' => ['numeric'],
            'tarif_salle' => ['required', 'max:255', 'string'],
            'acces_salle' => ['nullable', 'max:255', 'string'],
            'logistique_salle' => ['nullable', 'max:255', 'string'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'tel_whatsapp' => ['nullable', 'max:255', 'string'],
            'email_salle' => ['nullable', 'max:255', 'string'],
            'facebook_salle' => ['nullable', 'max:255', 'string'],
            'site_internet' => ['nullable', 'max:255', 'string'],
            'date_salle' => ['required', 'date'],
            'photo' => ['image', 'max:1024', 'nullable'],
            'commune_id' => ['nullable', 'exists:communes,id'],
            'ville_id' => ['nullable', 'exists:villes,id'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $salle = $quartier->salles()->create($validated);

        return new SalleResource($salle);
    }
}
