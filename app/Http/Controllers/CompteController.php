<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\CompteStoreRequest;
use App\Http\Requests\CompteUpdateRequest;

class CompteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Compte::class);

        $search = $request->get('search', '');

        $comptes = Compte::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.comptes.index', compact('comptes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Compte::class);

        $users = User::pluck('name', 'id');

        return view('app.comptes.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\CompteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompteStoreRequest $request)
    {
        $this->authorize('create', Compte::class);

        $validated = $request->validated();
        if ($request->hasFile('logo_entreprise')) {
            $validated['logo_entreprise'] = $request
                ->file('logo_entreprise')
                ->store('public');
        }
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request
                ->file('photo')
                ->store('public');
        }

        $compte = Compte::create($validated);

        return redirect()
            ->route('comptes.edit', $compte)
            ->withSuccess(__('crud.common.created'));
    }

    public function store_userdata(Request $request)
    {

        $user = User::find($request->user_id);

        $this->authorize('update', $user);

        $validated = $request->validate([
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required'],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->to("/user-dashboard-profil");
    }

    public function store_compte(Request $request)
    {

        $compte = Compte::find($request->currentid);

        $this->authorize('update', $compte);

        $validated = $request->validate([
            'nom_compte' => ['required', 'max:255', 'string'],
            'prenom_compte' => ['required', 'max:255', 'string'],
            'telephone_compte' => ['required', 'max:255', 'string'],
            'whatsapp_compte' => ['nullable', 'max:255', 'string'],
            'adresse_compte' => ['nullable', 'max:255', 'string'],
            'nom_entreprise' => ['nullable', 'max:255', 'string'],
            'siteweb_compte' => ['nullable', 'max:255', 'string'],
            'activite_compte' => ['nullable', 'max:255', 'string'],
            'description_compte' => ['nullable', 'max:255', 'string'],
            'logo_entreprise' => ['image', 'max:1024', 'nullable'],
            'photo' => ['image', 'max:1024', 'nullable'],
        ]);

        if ($request->hasFile('logo_entreprise')) {
            if ($compte->logo_entreprise) {
                Storage::delete($compte->logo_entreprise);
            }

            $validated['logo_entreprise'] = $request
                ->file('logo_entreprise')
                ->store('public');
        }

        if ($request->hasFile('photo')) {
            if ($compte->photo) {
                Storage::delete($compte->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('public');
        }

        $compte->update($validated);

        return redirect()->to("/user-dashboard-profil");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Compte $compte)
    {
        $this->authorize('view', $compte);

        return view('app.comptes.show', compact('compte'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Compte $compte)
    {
        $this->authorize('update', $compte);

        $users = User::pluck('name', 'id');

        return view('app.comptes.edit', compact('compte', 'users'));
    }

    /**
     * @param \App\Http\Requests\CompteUpdateRequest $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function update(CompteUpdateRequest $request, Compte $compte)
    {
        $this->authorize('update', $compte);

        $validated = $request->validated();
        if ($request->hasFile('logo_entreprise')) {
            if ($compte->logo_entreprise) {
                Storage::delete($compte->logo_entreprise);
            }

            $validated['logo_entreprise'] = $request
                ->file('logo_entreprise')
                ->store('public');
        }

        if ($request->hasFile('photo')) {
            if ($compte->photo) {
                Storage::delete($compte->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('public');
        }

        $compte->update($validated);

        return redirect()
            ->route('comptes.edit', $compte)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Compte $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Compte $compte)
    {
        $this->authorize('delete', $compte);

        if ($compte->logo_entreprise) {
            Storage::delete($compte->logo_entreprise);
        }

        $compte->delete();

        return redirect()
            ->route('comptes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
