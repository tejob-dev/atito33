<?php

namespace App\Http\Controllers\Api;

use App\Models\Ville;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalleResource;
use App\Http\Resources\SalleCollection;

class VilleSallesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Ville $ville)
    {
        $this->authorize('view', $ville);

        $search = $request->get('search', '');

        $salles = $ville
            ->salles()
            ->search($search)
            ->latest()
            ->paginate();

        return new SalleCollection($salles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ville $ville
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ville $ville)
    {
        $this->authorize('create', Salle::class);

        $validated = $request->validate([
            'type' => ['nullable', 'max:255', 'string'],
            'nom_salle' => ['required', 'max:255', 'string'],
            'adresse_salle' => ['required', 'max:255', 'string'],
            'presentation_salle' => ['nullable', 'max:1550', 'string'],
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
            'quartier_id' => ['nullable', 'exists:quartiers,id'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $salle = $ville->salles()->create($validated);

        return new SalleResource($salle);
    }
}
