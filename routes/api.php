<?php

use App\Models\Quartier;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TypeSalleResource;
use App\Http\Resources\TypeSalleCollection;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SalleController;
use App\Http\Controllers\Api\VilleController;
use App\Http\Controllers\Api\CompteController;
use App\Http\Controllers\Api\VisiteController;
use App\Http\Controllers\Api\CommuneController;
use App\Http\Controllers\Api\ComoditeController;
use App\Http\Controllers\Api\QuartierController;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Api\TexteJourController;
use App\Http\Controllers\Api\TypeSalleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\VideoSalleController;
use App\Http\Controllers\Api\PhotosSalleController;
use App\Http\Controllers\Api\VilleSallesController;
use App\Http\Controllers\Api\CompteSallesController;
use App\Http\Controllers\Api\CompteVillesController;
use App\Http\Controllers\Api\SalleComptesController;
use App\Http\Controllers\Api\VilleComptesController;
use App\Http\Controllers\Api\CommuneSallesController;
use App\Http\Controllers\Api\VilleCommunesController;
use App\Http\Controllers\Api\ComoditeSallesController;
use App\Http\Controllers\Api\QuartierSallesController;
use App\Http\Controllers\Api\CompteQuartiersController;
use App\Http\Controllers\Api\info_user_salleController;
use App\Http\Controllers\Api\QuartierComptesController;
use App\Http\Controllers\Api\SalleTypeSallesController;
use App\Http\Controllers\Api\TypeSalleSallesController;
use App\Http\Controllers\Api\CommuneQuartiersController;
use App\Http\Controllers\Api\salle_type_salleController;
use App\Http\Controllers\Api\SalleVideoSallesController;
use App\Http\Controllers\Api\VideoSalleSallesController;
use App\Http\Controllers\Api\PhotosSalleSallesController;
use App\Http\Controllers\Api\salle_video_salleController;
use App\Http\Controllers\Api\SallePhotosSallesController;
use App\Http\Controllers\Api\photos_salle_salleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->middleware(['auth:sanctum', 'verified'])->group(function () {

});

Route::name('api.')->group(function () {
    // Route::apiResource('roles', RoleController::class);
    // Route::apiResource('permissions', PermissionController::class);
    Route::post("/validate/videosalle", [VideoSalleController::class, "validate_videosalle"]);
    Route::post("/delete/videosalle", [VideoSalleController::class, "delete_videosalle"]);
    
    Route::post("/delete/photosalle", [PhotosSalleController::class, "delete_photosalle"]);
    Route::get("/render/photo/salles", [PhotosSalleController::class, "render_photo_salle"]);
    Route::get("/render/video/salles", [PhotosSalleController::class, "render_video_salle"]);
    Route::post("/make/view/annonce", [SalleController::class, "make_view_grow"]);
    Route::get("/typesalle", [TypeSalleController::class, "api_quartiersalle"]);
    
    Route::post("/upload/photosalle", [PhotosSalleController::class, "upload_photosalle"]);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name(
        'users.store'
    );
    Route::get('/users/{user}', [UserController::class, 'show'])->name(
        'users.show'
    );
    Route::put('/users/{user}', [UserController::class, 'update'])->name(
        'users.update'
    );
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name(
        'users.destroy'
    );

    Route::get('/communes', [CommuneController::class, 'index'])->name(
        'communes.index'
    );
    Route::post('/communes', [CommuneController::class, 'store'])->name(
        'communes.store'
    );
    Route::get('/communes/{commune}', [CommuneController::class, 'show'])->name(
        'communes.show'
    );
    Route::put('/communes/{commune}', [
        CommuneController::class,
        'update',
    ])->name('communes.update');
    Route::delete('/communes/{commune}', [
        CommuneController::class,
        'destroy',
    ])->name('communes.destroy');

    // Commune Quartiers
    Route::get('/communes/{commune}/quartiers', [
        CommuneQuartiersController::class,
        'index',
    ])->name('communes.quartiers.index');
    Route::post('/communes/{commune}/quartiers', [
        CommuneQuartiersController::class,
        'store',
    ])->name('communes.quartiers.store');

    // Commune Salles
    Route::get('/communes/{commune}/salles', [
        CommuneSallesController::class,
        'index',
    ])->name('communes.salles.index');
    Route::post('/communes/{commune}/salles', [
        CommuneSallesController::class,
        'store',
    ])->name('communes.salles.store');

    Route::get('/photos-salles', [PhotosSalleController::class, 'index'])->name(
        'photos-salles.index'
    );
    Route::post('/photos-salles', [
        PhotosSalleController::class,
        'store',
    ])->name('photos-salles.store');
    Route::get('/photos-salles/{photosSalle}', [
        PhotosSalleController::class,
        'show',
    ])->name('photos-salles.show');
    Route::put('/photos-salles/{photosSalle}', [
        PhotosSalleController::class,
        'update',
    ])->name('photos-salles.update');
    Route::delete('/photos-salles/{photosSalle}', [
        PhotosSalleController::class,
        'destroy',
    ])->name('photos-salles.destroy');

    // PhotosSalle Salles
    Route::get('/photos-salles/{photosSalle}/salles', [
        PhotosSalleSallesController::class,
        'index',
    ])->name('photos-salles.salles.index');
    Route::post('/photos-salles/{photosSalle}/salles/{salle}', [
        PhotosSalleSallesController::class,
        'store',
    ])->name('photos-salles.salles.store');
    Route::delete('/photos-salles/{photosSalle}/salles/{salle}', [
        PhotosSalleSallesController::class,
        'destroy',
    ])->name('photos-salles.salles.destroy');

    Route::get('/quartiers', [QuartierController::class, 'index'])->name(
        'quartiers.index'
    );
    Route::post('/quartiers', [QuartierController::class, 'store'])->name(
        'quartiers.store'
    );
    Route::get('/quartiers/{quartier}', [
        QuartierController::class,
        'show',
    ])->name('quartiers.show');
    Route::put('/quartiers/{quartier}', [
        QuartierController::class,
        'update',
    ])->name('quartiers.update');
    Route::delete('/quartiers/{quartier}', [
        QuartierController::class,
        'destroy',
    ])->name('quartiers.destroy');

    // Quartier Salles
    Route::get('/quartiers/{quartier}/salles', [
        QuartierSallesController::class,
        'index',
    ])->name('quartiers.salles.index');
    Route::post('/quartiers/{quartier}/salles', [
        QuartierSallesController::class,
        'store',
    ])->name('quartiers.salles.store');

    // Quartier Comptes
    Route::get('/quartiers/{quartier}/comptes', [
        QuartierComptesController::class,
        'index',
    ])->name('quartiers.comptes.index');
    Route::post('/quartiers/{quartier}/comptes/{compte}', [
        QuartierComptesController::class,
        'store',
    ])->name('quartiers.comptes.store');
    Route::delete('/quartiers/{quartier}/comptes/{compte}', [
        QuartierComptesController::class,
        'destroy',
    ])->name('quartiers.comptes.destroy');

    Route::get('/salles', [SalleController::class, 'index'])->name(
        'salles.index'
    );
    Route::post('/salles', [SalleController::class, 'store'])->name(
        'salles.store'
    );
    Route::get('/salles/{salle}', [SalleController::class, 'show'])->name(
        'salles.show'
    );
    Route::put('/salles/{salle}', [SalleController::class, 'update'])->name(
        'salles.update'
    );
    Route::delete('/salles/{salle}', [SalleController::class, 'destroy'])->name(
        'salles.destroy'
    );

    // Salle Photos Salles
    Route::get('/salles/{salle}/photos-salles', [
        SallePhotosSallesController::class,
        'index',
    ])->name('salles.photos-salles.index');
    Route::post('/salles/{salle}/photos-salles/{photosSalle}', [
        SallePhotosSallesController::class,
        'store',
    ])->name('salles.photos-salles.store');
    Route::delete('/salles/{salle}/photos-salles/{photosSalle}', [
        SallePhotosSallesController::class,
        'destroy',
    ])->name('salles.photos-salles.destroy');

    // Salle Type Salles
    Route::get('/salles/{salle}/type-salles', [
        SalleTypeSallesController::class,
        'index',
    ])->name('salles.type-salles.index');
    Route::post('/salles/{salle}/type-salles/{typeSalle}', [
        SalleTypeSallesController::class,
        'store',
    ])->name('salles.type-salles.store');
    Route::delete('/salles/{salle}/type-salles/{typeSalle}', [
        SalleTypeSallesController::class,
        'destroy',
    ])->name('salles.type-salles.destroy');

    // Salle Video Salles
    Route::get('/salles/{salle}/video-salles', [
        SalleVideoSallesController::class,
        'index',
    ])->name('salles.video-salles.index');
    Route::post('/salles/{salle}/video-salles/{videoSalle}', [
        SalleVideoSallesController::class,
        'store',
    ])->name('salles.video-salles.store');
    Route::delete('/salles/{salle}/video-salles/{videoSalle}', [
        SalleVideoSallesController::class,
        'destroy',
    ])->name('salles.video-salles.destroy');

    // Salle Comptes
    Route::get('/salles/{salle}/comptes', [
        SalleComptesController::class,
        'index',
    ])->name('salles.comptes.index');
    Route::post('/salles/{salle}/comptes/{compte}', [
        SalleComptesController::class,
        'store',
    ])->name('salles.comptes.store');
    Route::delete('/salles/{salle}/comptes/{compte}', [
        SalleComptesController::class,
        'destroy',
    ])->name('salles.comptes.destroy');

    Route::get('/texte-jours', [TexteJourController::class, 'index'])->name(
        'texte-jours.index'
    );
    Route::post('/texte-jours', [TexteJourController::class, 'store'])->name(
        'texte-jours.store'
    );
    Route::get('/texte-jours/{texteJour}', [
        TexteJourController::class,
        'show',
    ])->name('texte-jours.show');
    Route::put('/texte-jours/{texteJour}', [
        TexteJourController::class,
        'update',
    ])->name('texte-jours.update');
    Route::delete('/texte-jours/{texteJour}', [
        TexteJourController::class,
        'destroy',
    ])->name('texte-jours.destroy');

    Route::get('/type-salles', [TypeSalleController::class, 'index'])->name(
        'type-salles.index'
    );
    Route::post('/type-salles', [TypeSalleController::class, 'store'])->name(
        'type-salles.store'
    );
    Route::get('/type-salles/{typeSalle}', [
        TypeSalleController::class,
        'show',
    ])->name('type-salles.show');
    Route::put('/type-salles/{typeSalle}', [
        TypeSalleController::class,
        'update',
    ])->name('type-salles.update');
    Route::delete('/type-salles/{typeSalle}', [
        TypeSalleController::class,
        'destroy',
    ])->name('type-salles.destroy');

    // TypeSalle Salles
    Route::get('/type-salles/{typeSalle}/salles', [
        TypeSalleSallesController::class,
        'index',
    ])->name('type-salles.salles.index');
    Route::post('/type-salles/{typeSalle}/salles/{salle}', [
        TypeSalleSallesController::class,
        'store',
    ])->name('type-salles.salles.store');
    Route::delete('/type-salles/{typeSalle}/salles/{salle}', [
        TypeSalleSallesController::class,
        'destroy',
    ])->name('type-salles.salles.destroy');

    Route::get('/video-salles', [VideoSalleController::class, 'index'])->name(
        'video-salles.index'
    );
    Route::post('/video-salles', [VideoSalleController::class, 'store'])->name(
        'video-salles.store'
    );
    Route::get('/video-salles/{videoSalle}', [
        VideoSalleController::class,
        'show',
    ])->name('video-salles.show');
    Route::put('/video-salles/{videoSalle}', [
        VideoSalleController::class,
        'update',
    ])->name('video-salles.update');
    Route::delete('/video-salles/{videoSalle}', [
        VideoSalleController::class,
        'destroy',
    ])->name('video-salles.destroy');

    // VideoSalle Salles
    Route::get('/video-salles/{videoSalle}/salles', [
        VideoSalleSallesController::class,
        'index',
    ])->name('video-salles.salles.index');
    Route::post('/video-salles/{videoSalle}/salles/{salle}', [
        VideoSalleSallesController::class,
        'store',
    ])->name('video-salles.salles.store');
    Route::delete('/video-salles/{videoSalle}/salles/{salle}', [
        VideoSalleSallesController::class,
        'destroy',
    ])->name('video-salles.salles.destroy');

    Route::get('/villes', [VilleController::class, 'index'])->name(
        'villes.index'
    );
    Route::post('/villes', [VilleController::class, 'store'])->name(
        'villes.store'
    );
    Route::get('/villes/{ville}', [VilleController::class, 'show'])->name(
        'villes.show'
    );
    Route::put('/villes/{ville}', [VilleController::class, 'update'])->name(
        'villes.update'
    );
    Route::delete('/villes/{ville}', [VilleController::class, 'destroy'])->name(
        'villes.destroy'
    );

    // Ville Communes
    Route::get('/villes/{ville}/communes', [
        VilleCommunesController::class,
        'index',
    ])->name('villes.communes.index');
    Route::post('/villes/{ville}/communes', [
        VilleCommunesController::class,
        'store',
    ])->name('villes.communes.store');

    // Ville Salles
    Route::get('/villes/{ville}/salles', [
        VilleSallesController::class,
        'index',
    ])->name('villes.salles.index');
    Route::post('/villes/{ville}/salles', [
        VilleSallesController::class,
        'store',
    ])->name('villes.salles.store');

    // Ville Comptes
    Route::get('/villes/{ville}/comptes', [
        VilleComptesController::class,
        'index',
    ])->name('villes.comptes.index');
    Route::post('/villes/{ville}/comptes/{compte}', [
        VilleComptesController::class,
        'store',
    ])->name('villes.comptes.store');
    Route::delete('/villes/{ville}/comptes/{compte}', [
        VilleComptesController::class,
        'destroy',
    ])->name('villes.comptes.destroy');

    Route::get('/comptes', [CompteController::class, 'index'])->name(
        'comptes.index'
    );
    Route::post('/comptes', [CompteController::class, 'store'])->name(
        'comptes.store'
    );
    Route::get('/comptes/{compte}', [CompteController::class, 'show'])->name(
        'comptes.show'
    );
    Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name(
        'comptes.update'
    );
    Route::delete('/comptes/{compte}', [
        CompteController::class,
        'destroy',
    ])->name('comptes.destroy');

    // Compte Quartiers
    Route::get('/comptes/{compte}/quartiers', [
        CompteQuartiersController::class,
        'index',
    ])->name('comptes.quartiers.index');
    Route::post('/comptes/{compte}/quartiers/{quartier}', [
        CompteQuartiersController::class,
        'store',
    ])->name('comptes.quartiers.store');
    Route::delete('/comptes/{compte}/quartiers/{quartier}', [
        CompteQuartiersController::class,
        'destroy',
    ])->name('comptes.quartiers.destroy');

    // Compte Villes
    Route::get('/comptes/{compte}/villes', [
        CompteVillesController::class,
        'index',
    ])->name('comptes.villes.index');
    Route::post('/comptes/{compte}/villes/{ville}', [
        CompteVillesController::class,
        'store',
    ])->name('comptes.villes.store');
    Route::delete('/comptes/{compte}/villes/{ville}', [
        CompteVillesController::class,
        'destroy',
    ])->name('comptes.villes.destroy');

    // Compte Salles
    Route::get('/comptes/{compte}/salles', [
        CompteSallesController::class,
        'index',
    ])->name('comptes.salles.index');
    Route::post('/comptes/{compte}/salles/{salle}', [
        CompteSallesController::class,
        'store',
    ])->name('comptes.salles.store');
    Route::delete('/comptes/{compte}/salles/{salle}', [
        CompteSallesController::class,
        'destroy',
    ])->name('comptes.salles.destroy');

    Route::get('/visites', [VisiteController::class, 'index'])->name(
        'visites.index'
    );
    Route::post('/visites', [VisiteController::class, 'store'])->name(
        'visites.store'
    );
    Route::get('/visites/{visite}', [VisiteController::class, 'show'])->name(
        'visites.show'
    );
    Route::put('/visites/{visite}', [VisiteController::class, 'update'])->name(
        'visites.update'
    );
    Route::delete('/visites/{visite}', [
        VisiteController::class,
        'destroy',
    ])->name('visites.destroy');

    Route::get('/comodites', [ComoditeController::class, 'index'])->name(
        'comodites.index'
    );
    Route::post('/comodites', [ComoditeController::class, 'store'])->name(
        'comodites.store'
    );
    Route::get('/comodites/{comodite}', [
        ComoditeController::class,
        'show',
    ])->name('comodites.show');
    Route::put('/comodites/{comodite}', [
        ComoditeController::class,
        'update',
    ])->name('comodites.update');
    Route::delete('/comodites/{comodite}', [
        ComoditeController::class,
        'destroy',
    ])->name('comodites.destroy');

    Route::get('/comodites/{comodite}/salles', [
        ComoditeSallesController::class,
        'index',
    ])->name('comodites.salles.index');
    Route::post('/comodites/{comodite}/salles/{salle}', [
        ComoditeSallesController::class,
        'store',
    ])->name('comodites.salles.store');
    Route::delete('/comodites/{comodite}/salles/{salle}', [
        ComoditeSallesController::class,
        'destroy',
    ])->name('comodites.salles.destroy');
});
