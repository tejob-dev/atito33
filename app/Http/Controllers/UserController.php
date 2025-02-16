<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compte;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', User::class);

        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.users.index', compact('users', 'search'));
    }

    public function detail_utilisateur(Request $request, $compte){

        $compteId = $compte;

        return view('frontend.detailutilisateur', compact('compteId'));
    }

    public function verify_user(Request $request, $token){
        $user = User::where('verification_token', $token)->first();
    
        if (!$user) {
            return redirect("/")->withErrors("Ouups, votre compte n'a pas pu être activé, veuillez contacter: services@atito.net");
        }
    
        // Enable the user account
        $user->enabled = true;
        $user->verification_token = null; // Clear the token
        $user->save();
    
        return redirect("/")->withErrors("Votre compte a été correctement activé, veuillez vous connecter pour ajouter une annonce !");
    }


    public function register_user(Request $request){

        //dd( $request->all());
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:18',
            'nom_entreprise' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        $validated['name'] = $validated['nom']." ".$validated["prenom"];
        $validated['password'] = Hash::make($request->password);
        $validated['verification_token'] = Str::random(64);
        
        //dd($validated);
        $user = User::create($validated);

        // $user->verification_token = $validated['verification_token'];
        // $user->save();

        $compte = Compte::create([
            "nom_compte"=>$validated['nom'],
            "prenom_compte"=>$validated['prenom'],
            "telephone_compte"=>$validated['phone'],
            "photo"=>"public/profile.png",
            "logo_entreprise"=>"public/cover.jpg",
            "user_id"=>$user->id,
        ]);

        $user->syncRoles("PosterUserAccess");

        //Auth::login($user);
        if($user){
            ///SEND MAIL PRO TO USER
            $verificationUrl = url("/verify-email/".$validated['verification_token']);
            //AND SHOW SUCCESS DIALOG
            Mail::to($user->email)->send(new VerificationMail(strtoupper($compte->nom_compte." ".$compte->prenom_compte), $verificationUrl));
        }


        return redirect('/')->withErrors("Votre compte a été crée avec succès, veuillez consulter votre boite mail ou spam pour l'activation !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', User::class);

        $roles = Role::get();

        return view('app.users.create', compact('roles'));
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $this->authorize('view', $user);

        return view('app.users.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::get();

        return view('app.users.edit', compact('user', 'roles'));
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        $user->syncRoles($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
