<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Salle;
use App\Models\Ville;
use App\Models\Commune;
use App\Models\Comodite;
use App\Models\Quartier;
use App\Models\TypeSalle;
use App\Models\VideoSalle;
use App\Models\PhotosSalle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SalleStoreRequest;
use App\Http\Requests\SalleUpdateRequest;
use App\Http\Requests\ComoditeStoreRequest;
use App\Http\Requests\VideoSalleStoreRequest;
use App\Http\Requests\PhotosSalleStoreRequest;

class SalleController extends Controller
{

    public function getListAnnonce(Request $request, $single){

        
        $del = '<form action="/salles/';
        $token = csrf_token();
        $del2 = '" method="POST" style="display: contents;" onsubmit="return confirm(\'Voulez-vous vraiment supprimé?\')"><input type="hidden" name="_token" value="'.$token.'"> <input type="hidden" name="_method" value="DELETE"> <button type="submit" class="btn btn-light text-danger"><i class="icon ion-md-trash"></i></button></form>';
        
        if ($request->ajax()) {
            if($single == 0){
                $salles = auth()->user()->compte->salles()->orderBy('created_at')->get();
            }else{
                $salles = auth()->user()->compte->salles()->where('id', $single)->get();
            }
            return DataTables::of($salles)
                ->addIndexColumn()
                ->addColumn('createdat', function($row){
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->addColumn('actions', function($row) use($del, $del2, $single){
                    if($single == 0){
                        $phototag = '<a class="btnshowsallephoto btn btn-light text-info" data-salleid="'.$row->id.'" data-toggle="modal" data-target="#modalGallerySalle"><i class="icon ion-md-images" data-salleid="'.$row->id.'"></i></a>&nbsp;';
                        $videotag = '<a href="" data-salleid="'.$row->id.'" class="btnshowsvideo btn btn-light text-info" data-toggle="modal" data-target="#modalVideoSalle"><i class="icon ion-md-videocam" data-salleid="'.$row->id.'"></i></a>&nbsp;';
                        $edittag = '&nbsp;<a href="/user-annonce-detail/'.$row->id.'" class="btn btn-light text-warning"><i class="icon ion-md-brush"></i></a>';
                        $actionBtn = $phototag.$videotag.$edittag.''.$del.$row->id.$del2;
                    }else $actionBtn = "";
                    return $actionBtn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

    }

    public function detail_annonce(Request $request, $salle){

        //$salleid = Salle::findOrFail($salle);
        $salleid = $salle;

        return view("frontend.deatilannonce", compact("salleid"));
    }

    public function search_page(Request $request){

        //$search = $request->get('search', '');
        // TYPE DE SALLE 
        // COMODITES
        //dd($request->all());
        $salleObj = new Salle();

        $search = $request->get('search', '');
        $nbrinvite = $request->get('nbrinvite', '');
        //$prixrange2 = $request->get('prixrange2', '');
        $commune = $request->get('commune', '');
        $ville = $request->get('ville', '');
        $quartier = $request->get('quartier', '');
        $typesalle = $request->get('typesalle', '');
        $comodite = $request->get('comodite', '');


        $salleObj = $salleObj->with('commune','ville','quartier','typeSalles', 'comodites');

        if(!empty($search)){
            $salleObj = $salleObj->search($search);
        }
        
        if(!empty($nbrinvite)){
            $salleObj = $salleObj->where("capacite_salle", ">=", intval($nbrinvite) );
        }

        // if(!empty($prixrange2)){
        //     $prixrange2Arr = explode(";", $prixrange2);
        //     $salleObj = $salleObj->where(function ($query) use($prixrange2Arr) {
        //         $query->where('tarif_salle', '>=', intval($prixrange2Arr[0]))
        //               ->where('tarif_salle', '<=', intval($prixrange2Arr[1]));
        //     });
        // }

        if(!empty($commune)){
            if($commune != '0'){
                $salleObj = $salleObj->whereHas('commune', function ($query) use ($commune) {
                    $query->where("nom_commune", "like", "%".$commune."%");
                });
            }
        }

        if(!empty($ville)){
            if($ville != '0'){
                $salleObj = $salleObj->whereHas('ville', function ($query) use ($ville) {
                    $query->where("nom_ville", "like", "%".$ville."%");
                });
            }
        }
        
        if(!empty($quartier)){
            if($quartier != '0'){
                $salleObj = $salleObj->whereHas('quartier', function ($query) use ($quartier) {
                    $query->where("nom_quartier", "like", "%".$quartier."%");
                });
            }
        }
        
        if(!empty($typesalle)){
            if($typesalle != '0'){
                $salleObj = $salleObj->whereHas('typeSalles', function ($query) use ($typesalle) {
                    $query->where("libelle", "like", "%".$typesalle."%");
                });
            }
        }
        
        if(!empty($comodite)){
            //if($comodite != '0'){
                $salleObj = $salleObj->whereHas('comodites', function ($query) use ($comodite) {
                    $query->whereIn("id", array_map('intval', $comodite));
                });
            //}
            $comodite = array_map('intval', $comodite);
        }else $comodite = [];

        //dd($comodite);
        

        $annonces = $salleObj->latest()
        ->paginate(9)
        ->withQueryString();

       
        // ->paginate(9)
        // ->withQueryString();

        //dd($sallesGet);

        return view('frontend.search', compact('annonces', 'search', 'commune', 'ville', 'quartier', 'typesalle', 'comodite'));
    }
    
    public function promotion_page(Request $request){

        //$search = $request->get('search', '');
        // TYPE DE SALLE 
        // COMODITES
        $salleObj = new Salle();
        
        $search = $request->get('search', '');
        $nbrinvite = $request->get('nbrinvite', '');
        //$prixrange2 = $request->get('prixrange2', '');
        $commune = $request->get('commune', '');
        $ville = $request->get('ville', '');
        $quartier = $request->get('quartier', '');
        $typesalle = $request->get('typesalle', '');
        $comodite = $request->get('comodite', '');
        
        $salleObj = $salleObj->promote()->with('commune','ville','quartier','typeSalles', 'comodites');

        if(!empty($search)){
            $salleObj = $salleObj->search($search);
        }
        
        if(!empty($nbrinvite)){
            $salleObj = $salleObj->where("capacite_salle", ">=", intval($nbrinvite) );
        }

        // if(!empty($prixrange2)){
        //     $prixrange2Arr = explode(";", $prixrange2);
        //     $salleObj = $salleObj->where(function ($query) use($prixrange2Arr) {
        //         $query->where('tarif_salle', '>=', intval($prixrange2Arr[0]))
        //               ->where('tarif_salle', '<=', intval($prixrange2Arr[1]));
        //     });
        // }

        if(!empty($commune)){
            if($commune != '0'){
                $salleObj = $salleObj->whereHas('commune', function ($query) use ($commune) {
                    $query->where("nom_commune", "like", "%".$commune."%");
                });
            }
        }

        if(!empty($ville)){
            if($ville != '0'){
                $salleObj = $salleObj->whereHas('ville', function ($query) use ($ville) {
                    $query->where("nom_ville", "like", "%".$ville."%");
                });
            }
        }
        
        if(!empty($quartier)){
            if($quartier != '0'){
                $salleObj = $salleObj->whereHas('quartier', function ($query) use ($quartier) {
                    $query->where("nom_quartier", "like", "%".$quartier."%");
                });
            }
        }
        
        if(!empty($typesalle)){
            if($typesalle != '0'){
                $salleObj = $salleObj->whereHas('typeSalles', function ($query) use ($typesalle) {
                    $query->where("libelle", "like", "%".$typesalle."%");
                });
            }
        }
        
        if(!empty($comodite)){
            //if($comodite != '0'){
                $salleObj = $salleObj->whereHas('comodites', function ($query) use ($comodite) {
                    $query->whereIn("id", array_map('intval', $comodite));
                });
            //}
            $comodite = array_map('intval', $comodite);
        }else $comodite = [];

        //dd($comodite);
        

        $annonces = $salleObj->latest()
        ->paginate(9)
        ->withQueryString();

       
        // ->paginate(9)
        // ->withQueryString();

        //dd($sallesGet);

        return view('frontend.promotion', compact('annonces', 'search', 'commune', 'ville', 'quartier', 'typesalle', 'comodite'));
    }
    
    public function nouveautes_page(Request $request){

        //$search = $request->get('search', '');
        // TYPE DE SALLE 
        // COMODITES
        $salleObj = new Salle();

        $search = $request->get('search', '');
        $nbrinvite = $request->get('nbrinvite', '');
        //$prixrange2 = $request->get('prixrange2', '');
        $commune = $request->get('commune', '');
        $ville = $request->get('ville', '');
        $quartier = $request->get('quartier', '');
        $typesalle = $request->get('typesalle', '');
        $comodite = $request->get('comodite', '');


        $salleObj = $salleObj->with('commune','ville','quartier','typeSalles', 'comodites');

        if(!empty($search)){
            $salleObj = $salleObj->search($search);
        }
        
        if(!empty($nbrinvite)){
            $salleObj = $salleObj->where("capacite_salle", ">=", intval($nbrinvite) );
        }

        // if(!empty($prixrange2)){
        //     $prixrange2Arr = explode(";", $prixrange2);
        //     $salleObj = $salleObj->where(function ($query) use($prixrange2Arr) {
        //         $query->where('tarif_salle', '>=', intval($prixrange2Arr[0]))
        //               ->where('tarif_salle', '<=', intval($prixrange2Arr[1]));
        //     });
        // }

        if(!empty($commune)){
            if($commune != '0'){
                $salleObj = $salleObj->whereHas('commune', function ($query) use ($commune) {
                    $query->where("nom_commune", "like", "%".$commune."%");
                });
            }
        }

        if(!empty($ville)){
            if($ville != '0'){
                $salleObj = $salleObj->whereHas('ville', function ($query) use ($ville) {
                    $query->where("nom_ville", "like", "%".$ville."%");
                });
            }
        }
        
        if(!empty($quartier)){
            if($quartier != '0'){
                $salleObj = $salleObj->whereHas('quartier', function ($query) use ($quartier) {
                    $query->where("nom_quartier", "like", "%".$quartier."%");
                });
            }
        }
        
        if(!empty($typesalle)){
            if($typesalle != '0'){
                $salleObj = $salleObj->whereHas('typeSalles', function ($query) use ($typesalle) {
                    $query->where("libelle", "like", "%".$typesalle."%");
                });
            }
        }
        
        if(!empty($comodite)){
            //if($comodite != '0'){
                $salleObj = $salleObj->whereHas('comodites', function ($query) use ($comodite) {
                    $query->whereIn("id", array_map('intval', $comodite));
                });
            //}
            $comodite = array_map('intval', $comodite);
        }else $comodite = [];

        //dd($comodite);
        

        $annonces = $salleObj->latest()
        ->paginate(9)
        ->withQueryString();

       
        // ->paginate(9)
        // ->withQueryString();

        //dd($sallesGet);

        return view('frontend.nouveautes', compact('annonces', 'search', 'commune', 'ville', 'quartier', 'typesalle', 'comodite'));
    }
    
    public function bureauxcowork_page(Request $request){

        //$search = $request->get('search', '');
        $salleObj = new Salle();
        //$prixrange2 = $request->get('prixrange2', '');
        $search = $request->get('search', '');
        $nbrinvite = $request->get('nbrinvite', '');
        //$prixrange2 = $request->get('prixrange2', '');
        $commune = $request->get('commune', '');
        $ville = $request->get('ville', '');
        $quartier = $request->get('quartier', '');
        $typesalle = $request->get('typesalle', '');
        $comodite = $request->get('comodite', '');
        
        
        $salleObj = $salleObj->burocowork()->with('commune','ville','quartier','typeSalles', 'comodites');

        if(!empty($search)){
            $salleObj = $salleObj->search($search);
        }
        
        if(!empty($nbrinvite)){
            $salleObj = $salleObj->where("capacite_salle", ">=", intval($nbrinvite) );
        }

        // if(!empty($prixrange2)){
        //     $prixrange2Arr = explode(";", $prixrange2);
        //     $salleObj = $salleObj->where(function ($query) use($prixrange2Arr) {
        //         $query->where('tarif_salle', '>=', intval($prixrange2Arr[0]))
        //               ->where('tarif_salle', '<=', intval($prixrange2Arr[1]));
        //     });
        // }

        if(!empty($commune)){
            if($commune != '0'){
                $salleObj = $salleObj->whereHas('commune', function ($query) use ($commune) {
                    $query->where("nom_commune", "like", "%".$commune."%");
                });
            }
        }

        if(!empty($ville)){
            if($ville != '0'){
                $salleObj = $salleObj->whereHas('ville', function ($query) use ($ville) {
                    $query->where("nom_ville", "like", "%".$ville."%");
                });
            }
        }
        
        if(!empty($quartier)){
            if($quartier != '0'){
                $salleObj = $salleObj->whereHas('quartier', function ($query) use ($quartier) {
                    $query->where("nom_quartier", "like", "%".$quartier."%");
                });
            }
        }
        
        if(!empty($typesalle)){
            if($typesalle != '0'){
                $salleObj = $salleObj->whereHas('typeSalles', function ($query) use ($typesalle) {
                    $query->where("libelle", "like", "%".$typesalle."%");
                });
            }
        }
        
        if(!empty($comodite)){
            //if($comodite != '0'){
                $salleObj = $salleObj->whereHas('comodites', function ($query) use ($comodite) {
                    $query->whereIn("id", array_map('intval', $comodite));
                });
            //}
            $comodite = array_map('intval', $comodite);
        }else $comodite = [];

        //dd($comodite);
        

        $annonces = $salleObj->latest()
        ->paginate(9)
        ->withQueryString();

       
        // ->paginate(9)
        // ->withQueryString();

        //dd($sallesGet);

        return view('frontend.bureauxcoworking', compact('annonces', 'search', 'commune', 'ville', 'quartier', 'typesalle', 'comodite'));
    }

    public function save_salle(SalleStoreRequest $request)
    {

        //dd($request->all());
        if(isset($request->forupdated)){

            $salle = Salle::find($request->forupdated);

            $this->authorize('update', $salle);

            $validated = $request->validate([
                'typesalle_id' => ['required', 'max:255', 'string'],
                'nom_salle' => ['required', 'max:255', 'string'],
                'adresse_salle' => ['required', 'max:255', 'string'],
                'presentation_salle' => ['required','max:1550', 'string'],
                'capacite_salle' => ['numeric'],
                'telephone' => ['required', 'max:255', 'string'],
                'email_salle' => ['required', 'max:255', 'string'],
                'tarif_salle' => ['nullable', 'max:255', 'string'],
                'tel_whatsapp' => ['required', 'max:255', 'string'],
                'facebook_salle' => ['required', 'max:255', 'string'],
                'site_internet' => ['required', 'max:255', 'string'],
                'photo' => ['image', 'nullable'],
                'commune_id' => ['required', 'exists:communes,id'],
                'ville_id' => ['required', 'exists:villes,id'],
                'quartier_id' => ['nullable', 'exists:quartiers,id'],
                'comodite' => ['required', 'max:255', 'array'],
                'type' => ['nullable', 'max:255', 'string'],
                'acces_salle' => ['nullable', 'max:255', 'string'],
                'logistique_salle' => ['nullable', 'max:255', 'string'],
                'date_salle' => ['nullable', 'date'],
            ]);

            if ($request->hasFile('photo')) {
                if ($salle->photo) {
                    Storage::delete($salle->photo);
                }
    
                $validated['photo'] = $request->file('photo')->store('public');
            }

            ///$validated["user_id"] = $request->user_id;
            $data = collect($validated)->only([
                'nom_salle',
                'adresse_salle',
                'presentation_salle',
                'capacite_salle',
                'telephone',
                'email_salle',
                'tarif_salle',
                'tel_whatsapp',
                'facebook_salle',
                'site_internet',
                'photo',
                'commune_id',
                'ville_id',
                'quartier_id',
                ])->all();

               // dd($data);
            
            if ($request->has('typesalle_id')) {
                $lidata = $salle->typeSalles->pluck("id")->toArray();
                $salle->typeSalles()->detach($lidata);
                $salle->typeSalles()->attach($request->typesalle_id, []);
            }
            
            if ($request->has('comodite')) {
                $lidata = $salle->comodites->pluck("id")->toArray();
                $salle->comodites()->detach($lidata);
                if(sizeof($request->comodite) > 0){
                    $salle->comodites()->attach($request->comodite, []);
                }
            }
    
            $salle->update($data);

            return redirect()->back();
        }

        $this->authorize('create', Salle::class);

        //dd($request->all());

        $validated = $request->validate([
            'typesalle_id' => ['required', 'max:255', 'string'],
            'nom_salle' => ['required', 'max:255', 'string'],
            'adresse_salle' => ['required', 'max:255', 'string'],
            'presentation_salle' => ['required','max:1550', 'string'],
            'capacite_salle' => ['numeric'],
            'telephone' => ['required', 'max:255', 'string'],
            'email_salle' => ['required', 'max:255', 'string'],
            'tarif_salle' => ['nullable', 'max:255', 'string'],
            'tel_whatsapp' => ['required', 'max:255', 'string'],
            'facebook_salle' => ['required', 'max:255', 'string'],
            'site_internet' => ['required', 'max:255', 'string'],
            'photo' => ['image', 'nullable'],
            'commune_id' => ['required', 'exists:communes,id'],
            'ville_id' => ['required', 'exists:villes,id'],
            'quartier_id' => ['nullable', 'exists:quartiers,id'],
            'comodite' => ['required', 'max:255', 'array'],
            'type' => ['nullable', 'max:255', 'string'],
            'acces_salle' => ['nullable', 'max:255', 'string'],
            'logistique_salle' => ['nullable', 'max:255', 'string'],
            'date_salle' => ['nullable', 'date'],
        ]);

        //dd($validated);
        
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }
        
        //$validated["user_id"] = $request->user_id;
        
        $data = collect($validated)->only([
            'nom_salle',
            'adresse_salle',
            'presentation_salle',
            'capacite_salle',
            'telephone',
            'email_salle',
            'tarif_salle',
            'tel_whatsapp',
            'facebook_salle',
            'site_internet',
            'photo',
            'commune_id',
            'ville_id',
            'quartier_id',
            ])->all();

        $salle = Salle::create($data);
        
        if ($request->has('typesalle_id')) {
            $salle->typeSalles()->attach($request->typesalle_id, []);
        }
        
        if ($request->has('comodite')) {
            if(sizeof($request->comodite) > 0){
                $salle->comodites()->attach($request->comodite, []);
            }
        }

        auth()->user()->compte->salles()->attach($salle->id);

        return redirect()->to("/user-dashboard-annonce");
    }

    public function save_photo(PhotosSalleStoreRequest $request){

        $this->authorize('create', PhotosSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }
        
        $photosSalle = PhotosSalle::create($validated);
        
        if($request->salle_id){
            Salle::find($request->salle_id)->photosSalles()->attach($photosSalle->id,[]);
        }

        return redirect()->back();

    }

    public function save_video(VideoSalleStoreRequest $request){
        $this->authorize('create', VideoSalle::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $videoSalle = VideoSalle::create($validated);

        if($request->salle_id){
            Salle::find($request->salle_id)->videoSalles()->attach($videoSalle->id,[]);
        }

        return redirect()->back();

    }

    public function save_comodite(Request $request){

        $this->authorize('create', Comodite::class);

        if($request->salle_id){
            Salle::find($request->salle_id)->comodites()->attach($request->comodite_id,[]);
        }

        return redirect()->back();

    }

    public function save_typesalle(Request $request){

        //dd($request->all());
        $this->authorize('create', TypeSalle::class);
        if($request->salle_id){
            Salle::find($request->salle_id)->typeSalles()->attach($request->typesalle_id,[]);
        }

        return redirect()->back();

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Salle::class);

        $search = $request->get('search', '');

        $salles = Salle::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.salles.index', compact('salles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Salle::class);

        $communes = Commune::pluck('nom_commune', 'id');
        $villes = Ville::pluck('nom_ville', 'id');
        $quartiers = Quartier::pluck('nom_quartier', 'id');

        return view(
            'app.salles.create',
            compact('communes', 'villes', 'quartiers')
        );
    }

    /**
     * @param \App\Http\Requests\SalleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalleStoreRequest $request)
    {
        $this->authorize('create', Salle::class);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $salle = Salle::create($validated);

        return redirect()
            ->route('salles.edit', $salle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Salle $salle)
    {
        $this->authorize('view', $salle);

        return view('app.salles.show', compact('salle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Salle $salle)
    {
        $this->authorize('update', $salle);

        $communes = Commune::pluck('nom_commune', 'id');
        $villes = Ville::pluck('nom_ville', 'id');
        $quartiers = Quartier::pluck('nom_quartier', 'id');

        return view(
            'app.salles.edit',
            compact('salle', 'communes', 'villes', 'quartiers')
        );
    }

    /**
     * @param \App\Http\Requests\SalleUpdateRequest $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        $this->authorize('update', $salle);

        $validated = $request->validate([
            'type' => ['nullable', 'max:255', 'string'],
            'nom_salle' => ['required', 'max:255', 'string'],
            'adresse_salle' => ['required', 'max:255', 'string'],
            'presentation_salle' => ['nullable','max:1550', 'string'],
            'capacite_salle' => ['numeric'],
            'tarif_salle' => ['nullable', 'max:255', 'string'],
            'acces_salle' => ['nullable', 'max:255', 'string'],
            'logistique_salle' => ['nullable', 'max:255', 'string'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'tel_whatsapp' => ['nullable', 'max:255', 'string'],
            'email_salle' => ['nullable', 'max:255', 'string'],
            'facebook_salle' => ['nullable', 'max:255', 'string'],
            'site_internet' => ['nullable', 'max:255', 'string'],
            'date_salle' => ['nullable', 'date'],
            'validated' => ['nullable', 'max:255', 'string'],
            'promoted' => ['nullable', 'max:255', 'string'],
            'photo' => ['nullable'],
            'commune_id' => ['nullable', 'exists:communes,id'],
            'ville_id' => ['nullable', 'exists:villes,id'],
            'quartier_id' => ['nullable', 'exists:quartiers,id'],
        ]);

        if ($request->hasFile('photo')) {
            dd($request->photo);
            if ($salle->photo) {
                Storage::delete($salle->photo);
            }
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $salle->update($validated);

        return redirect()
            ->route('salles.edit', $salle)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Salle $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Salle $salle)
    {
        $this->authorize('delete', $salle);

        $salle->delete();

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.removed'));
    }
}
