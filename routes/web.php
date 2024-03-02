<?php

use App\Models\Salle;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ComoditeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\TexteJourController;
use App\Http\Controllers\TypeSalleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\VideoSalleController;
use App\Http\Controllers\PhotosSalleController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(!empty(auth()->user())){
        
        return redirect("/administration");

    }
    return view('welcome');
});

Route::get('/recherche/salles', [SalleController::class, "search_page"]);
Route::get('/recherche/promotions', [SalleController::class, "promotion_page"]);
Route::get('/nouvelles/annonces', [SalleController::class, "nouveautes_page"]);
Route::get('/voir/bureauxcowork', [SalleController::class, "bureauxcowork_page"]);
Route::get('/voir/detail/{salle}/annonce', [SalleController::class, "detail_annonce"]);
Route::get('/voir/detail/{compte}/utilisateur', [UserController::class, "detail_utilisateur"]);

Route::post('/contacts/poster/annonce', [ContactController::class, 'store_front']);
Route::post('/contacts/newsletter', [ContactController::class, 'store_front_news']);
Route::post('/register/custom', [UserController::class, 'register_user']);
//Route::get('/administration', [HomeController::class, 'index'])->name('home');

//Route::redirect('/login', '/', 302, ['GET']);

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/administration', function () {
        //dd(auth()->user()->roles);
        if(auth()->user()->hasRole("super-admin") == false){
            return redirect("/");
        }
        
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::get('/user-dashboard', [UserDashboardController::class, "index"]);
        Route::get('/user-dashboard-profil', function(){
            if(!empty(auth()->user())){
        
                return redirect("/administration");
        
            }
            return view("useradmin.dashboard-myprofile");
        });
        Route::get('/user-dashboard-edit-profil', function(){
            return view("useradmin.dashboard-edit-myprofile");
        });
        Route::get('/user-dashboard-message', function(){
            return view("useradmin.dashboard-messages");
        });
        Route::get('/user-dashboard-annonce', function(){
            return view("useradmin.dashboard-annoncelist");
        });
        Route::get('/user-dashboard-add-annonce', function(){
            return view("useradmin.user-dashboard");
        });
        Route::get('/user-dashboard-annonce-salle', function($request){

        });
        Route::get('/user-dashboard-annonce-photo', function($request){

        });
        Route::get('/user-annonce-detail/{salleid}', function($salleid){
            $salleid = Salle::findOrFail($salleid);
            $typeSalle = $salleid->typeSalles()->get()->pluck("id")->toArray();
            //dd($salleid->typeSalles()->get()->pluck("id")->toArray());
            return view("useradmin.user-dashboard", compact("salleid", "typeSalle"));
        });
        Route::get('/user-annonce-detail/{salleid}/edit', function(){
            return view("useradmin.user-dashboard");
        });
        Route::get('/user-dashboard-annonce-video', function($request){

        });
        Route::get('/annonces/{single}/data', [SalleController::class, "getListAnnonce"]);
        Route::get('/annonces/datatable/1', function(){
            return view("useradmin.datatables.annonce-datatable");
        });
        Route::get('/annonces/datatable/2', function(){
            return view("useradmin.datatables.annonce-datatable2");
        });

        Route::post("/user-annonce-detail/{salleid}/{itemid}/image/del", function($salleid, $itemid){
            Salle::find($salleid)->photosSalles()->detach($itemid);
            App\Models\PhotosSalle::find($itemid)->delete();

            return new JsonResponse(['ok'=>true], 200);
        });
        
        Route::post("/user-annonce-detail/{salleid}/{itemid}/video/del", function($salleid, $itemid){
            Salle::find($salleid)->videoSalles()->detach($itemid);
            App\Models\VideoSalle::find($itemid)->delete();

            return new JsonResponse(['ok'=>true], 200);
        });
        
        Route::post("/user-annonce-detail/{salleid}/{itemid}/comodite/del", function($salleid, $itemid){
            Salle::find($salleid)->comodites()->detach($itemid);
            //App\Models\Comodite::find($itemid)->delete();

            return new JsonResponse(['ok'=>true], 200);
        });
        
        Route::post("/user-annonce-detail/{salleid}/{itemid}/typesalle/del", function($salleid, $itemid){
            Salle::find($salleid)->typeSalles()->detach($itemid);
            //App\Models\TypeSalle::find($itemid)->delete();

            return new JsonResponse(['ok'=>true], 200);
        });
        
        
        Route::post('/send/salle/register', [SalleController::class, 'save_salle']);
        Route::post('/send/image/register', [SalleController::class, 'save_photo']);
        Route::post('/send/video/register', [SalleController::class, 'save_video']);
        Route::post('/send/comodites/register', [SalleController::class, 'save_comodite']);
        Route::post('/send/typesalle/register', [SalleController::class, 'save_typesalle']);
        
        Route::post('/userdata/user/store', [CompteController::class, 'store_userdata']);
        Route::post('/comptes/user/store', [CompteController::class, 'store_compte']);
        

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('communes', [CommuneController::class, 'index'])->name(
            'communes.index'
        );
        Route::post('communes', [CommuneController::class, 'store'])->name(
            'communes.store'
        );
        Route::get('communes/create', [
            CommuneController::class,
            'create',
        ])->name('communes.create');
        Route::get('communes/{commune}', [
            CommuneController::class,
            'show',
        ])->name('communes.show');
        Route::get('communes/{commune}/edit', [
            CommuneController::class,
            'edit',
        ])->name('communes.edit');
        Route::put('communes/{commune}', [
            CommuneController::class,
            'update',
        ])->name('communes.update');
        Route::delete('communes/{commune}', [
            CommuneController::class,
            'destroy',
        ])->name('communes.destroy');

        Route::get('photos-salles', [
            PhotosSalleController::class,
            'index',
        ])->name('photos-salles.index');
        Route::post('photos-salles', [
            PhotosSalleController::class,
            'store',
        ])->name('photos-salles.store');
        Route::get('photos-salles/create', [
            PhotosSalleController::class,
            'create',
        ])->name('photos-salles.create');
        Route::get('photos-salles/{photosSalle}', [
            PhotosSalleController::class,
            'show',
        ])->name('photos-salles.show');
        Route::get('photos-salles/{photosSalle}/edit', [
            PhotosSalleController::class,
            'edit',
        ])->name('photos-salles.edit');
        Route::put('photos-salles/{photosSalle}', [
            PhotosSalleController::class,
            'update',
        ])->name('photos-salles.update');
        Route::delete('photos-salles/{photosSalle}', [
            PhotosSalleController::class,
            'destroy',
        ])->name('photos-salles.destroy');

        Route::get('quartiers', [QuartierController::class, 'index'])->name(
            'quartiers.index'
        );
        Route::post('quartiers', [QuartierController::class, 'store'])->name(
            'quartiers.store'
        );
        Route::get('quartiers/create', [
            QuartierController::class,
            'create',
        ])->name('quartiers.create');
        Route::get('quartiers/{quartier}', [
            QuartierController::class,
            'show',
        ])->name('quartiers.show');
        Route::get('quartiers/{quartier}/edit', [
            QuartierController::class,
            'edit',
        ])->name('quartiers.edit');
        Route::put('quartiers/{quartier}', [
            QuartierController::class,
            'update',
        ])->name('quartiers.update');
        Route::delete('quartiers/{quartier}', [
            QuartierController::class,
            'destroy',
        ])->name('quartiers.destroy');

        Route::get('salles', [SalleController::class, 'index'])->name(
            'salles.index'
        );
        Route::post('salles', [SalleController::class, 'store'])->name(
            'salles.store'
        );
        Route::get('salles/create', [SalleController::class, 'create'])->name(
            'salles.create'
        );
        Route::get('salles/{salle}', [SalleController::class, 'show'])->name(
            'salles.show'
        );
        Route::get('salles/{salle}/edit', [
            SalleController::class,
            'edit',
        ])->name('salles.edit');
        Route::put('salles/{salle}', [SalleController::class, 'update'])->name(
            'salles.update'
        );
        Route::delete('salles/{salle}', [
            SalleController::class,
            'destroy',
        ])->name('salles.destroy');

        Route::get('texte-jours', [TexteJourController::class, 'index'])->name(
            'texte-jours.index'
        );
        Route::post('texte-jours', [TexteJourController::class, 'store'])->name(
            'texte-jours.store'
        );
        Route::get('texte-jours/create', [
            TexteJourController::class,
            'create',
        ])->name('texte-jours.create');
        Route::get('texte-jours/{texteJour}', [
            TexteJourController::class,
            'show',
        ])->name('texte-jours.show');
        Route::get('texte-jours/{texteJour}/edit', [
            TexteJourController::class,
            'edit',
        ])->name('texte-jours.edit');
        Route::put('texte-jours/{texteJour}', [
            TexteJourController::class,
            'update',
        ])->name('texte-jours.update');
        Route::delete('texte-jours/{texteJour}', [
            TexteJourController::class,
            'destroy',
        ])->name('texte-jours.destroy');

        Route::get('type-salles', [TypeSalleController::class, 'index'])->name(
            'type-salles.index'
        );
        Route::post('type-salles', [TypeSalleController::class, 'store'])->name(
            'type-salles.store'
        );
        Route::get('type-salles/create', [
            TypeSalleController::class,
            'create',
        ])->name('type-salles.create');
        Route::get('type-salles/{typeSalle}', [
            TypeSalleController::class,
            'show',
        ])->name('type-salles.show');
        Route::get('type-salles/{typeSalle}/edit', [
            TypeSalleController::class,
            'edit',
        ])->name('type-salles.edit');
        Route::put('type-salles/{typeSalle}', [
            TypeSalleController::class,
            'update',
        ])->name('type-salles.update');
        Route::delete('type-salles/{typeSalle}', [
            TypeSalleController::class,
            'destroy',
        ])->name('type-salles.destroy');

        Route::get('video-salles', [
            VideoSalleController::class,
            'index',
        ])->name('video-salles.index');
        Route::post('video-salles', [
            VideoSalleController::class,
            'store',
        ])->name('video-salles.store');
        Route::get('video-salles/create', [
            VideoSalleController::class,
            'create',
        ])->name('video-salles.create');
        Route::get('video-salles/{videoSalle}', [
            VideoSalleController::class,
            'show',
        ])->name('video-salles.show');
        Route::get('video-salles/{videoSalle}/edit', [
            VideoSalleController::class,
            'edit',
        ])->name('video-salles.edit');
        Route::put('video-salles/{videoSalle}', [
            VideoSalleController::class,
            'update',
        ])->name('video-salles.update');
        Route::delete('video-salles/{videoSalle}', [
            VideoSalleController::class,
            'destroy',
        ])->name('video-salles.destroy');

        Route::get('villes', [VilleController::class, 'index'])->name(
            'villes.index'
        );
        Route::post('villes', [VilleController::class, 'store'])->name(
            'villes.store'
        );
        Route::get('villes/create', [VilleController::class, 'create'])->name(
            'villes.create'
        );
        Route::get('villes/{ville}', [VilleController::class, 'show'])->name(
            'villes.show'
        );
        Route::get('villes/{ville}/edit', [
            VilleController::class,
            'edit',
        ])->name('villes.edit');
        Route::put('villes/{ville}', [VilleController::class, 'update'])->name(
            'villes.update'
        );
        Route::delete('villes/{ville}', [
            VilleController::class,
            'destroy',
        ])->name('villes.destroy');

        Route::get('comptes', [CompteController::class, 'index'])->name(
            'comptes.index'
        );
        Route::post('comptes', [CompteController::class, 'store'])->name(
            'comptes.store'
        );
        Route::get('comptes/create', [CompteController::class, 'create'])->name(
            'comptes.create'
        );
        Route::get('comptes/{compte}', [CompteController::class, 'show'])->name(
            'comptes.show'
        );
        Route::get('comptes/{compte}/edit', [
            CompteController::class,
            'edit',
        ])->name('comptes.edit');
        Route::put('comptes/{compte}', [
            CompteController::class,
            'update',
        ])->name('comptes.update');
        Route::delete('comptes/{compte}', [
            CompteController::class,
            'destroy',
        ])->name('comptes.destroy');


        Route::get('visites', [VisiteController::class, 'index'])->name(
            'visites.index'
        );
        Route::post('visites', [VisiteController::class, 'store'])->name(
            'visites.store'
        );
        Route::get('visites/create', [VisiteController::class, 'create'])->name(
            'visites.create'
        );
        Route::get('visites/{visite}', [VisiteController::class, 'show'])->name(
            'visites.show'
        );
        Route::get('visites/{visite}/edit', [
            VisiteController::class,
            'edit',
        ])->name('visites.edit');
        Route::put('visites/{visite}', [
            VisiteController::class,
            'update',
        ])->name('visites.update');
        Route::delete('visites/{visite}', [
            VisiteController::class,
            'destroy',
        ])->name('visites.destroy');

        Route::get('comodites', [ComoditeController::class, 'index'])->name(
            'comodites.index'
        );
        Route::post('comodites', [ComoditeController::class, 'store'])->name(
            'comodites.store'
        );
        Route::get('comodites/create', [
            ComoditeController::class,
            'create',
        ])->name('comodites.create');
        Route::get('comodites/{comodite}', [
            ComoditeController::class,
            'show',
        ])->name('comodites.show');
        Route::get('comodites/{comodite}/edit', [
            ComoditeController::class,
            'edit',
        ])->name('comodites.edit');
        Route::put('comodites/{comodite}', [
            ComoditeController::class,
            'update',
        ])->name('comodites.update');
        Route::delete('comodites/{comodite}', [
            ComoditeController::class,
            'destroy',
        ])->name('comodites.destroy');

        Route::get('contacts', [ContactController::class, 'index'])->name(
            'contacts.index'
        );
        Route::post('contacts', [ContactController::class, 'store'])->name(
            'contacts.store'
        );
        Route::get('contacts/create', [
            ContactController::class,
            'create',
        ])->name('contacts.create');
        Route::get('contacts/{contact}', [
            ContactController::class,
            'show',
        ])->name('contacts.show');
        Route::get('contacts/{contact}/edit', [
            ContactController::class,
            'edit',
        ])->name('contacts.edit');
        Route::put('contacts/{contact}', [
            ContactController::class,
            'update',
        ])->name('contacts.update');
        Route::delete('contacts/{contact}', [
            ContactController::class,
            'destroy',
        ])->name('contacts.destroy');
    });
