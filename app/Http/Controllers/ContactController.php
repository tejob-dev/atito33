<?php

namespace App\Http\Controllers;

use App\Mail\PokeMail;
use App\Models\Compte;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Contact::class);

        $search = $request->get('search', '');

        $contacts = Contact::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.contacts.index', compact('contacts', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Contact::class);

        $comptes = Compte::pluck('nom_compte', 'id');

        return view('app.contacts.create', compact('comptes'));
    }

    /**
     * @param \App\Http\Requests\ContactStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $this->authorize('create', Contact::class);

        $validated = $request->validated();

        $contact = Contact::create($validated);

        return redirect()
            ->route('contacts.edit', $contact)
            ->withSuccess(__('crud.common.created'));
    }

    public function store_front(Request $request){

        $compteid = Compte::findOrFail($request->compte_id);

        if($compteid){
            $contact = Contact::create($request->all());
            $user = $compteid->user;

            // dd($user, $request->all());

            //SEND MAIL TO USER FOR THIS ACTION
            if(isset($request->email)){
                Mail::to($request->email)->send(new ContactMail(strtoupper($request->nom_prenom_c), $user->email));
            }
            if($user->email){
                Mail::to($user->email)->send(new PokeMail(strtoupper($request->nom_prenom_c), $request->email, $request->message));
            }
        }

        return redirect()->back()->withErrors("Votre message a été bien envoyé ");

    }
    
    public function store_front_news(Request $request){

        Contact::create($request->all());

        return redirect()->back();

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contact $contact)
    {
        $this->authorize('view', $contact);

        return view('app.contacts.show', compact('contact'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $comptes = Compte::pluck('nom_compte', 'id');

        return view('app.contacts.edit', compact('contact', 'comptes'));
    }

    /**
     * @param \App\Http\Requests\ContactUpdateRequest $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $validated = $request->validated();

        $contact->update($validated);

        return redirect()
            ->route('contacts.edit', $contact)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
