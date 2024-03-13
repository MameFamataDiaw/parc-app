<?php

use App\Models\Contrat;
use App\Models\Conducteur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::view('/admin/dashboard', 'admin.dashboard')->name('/admin/dashboard');
    });

    Route::group(['middleware' => 'checkRole:driver'], function() {
        Route::view('/driver/index', 'driver.index')->name('/driver/index');
    });

    Route::group(['middleware' => 'checkRole:passenger'], function() {
        Route::view('/passenger/passenger', 'passenger.passenger')->name('/passenger/passenger');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Route vers le tableau de bord de l'administration
    //Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::middleware(['auth'])->resource('/voitures', VoitureController::class);
    Route::middleware(['auth'])->resource('/conducteurs', ConducteurController::class);
    Route::middleware(['auth'])->resource('/attributions', AttributionController::class);
    Route::middleware(['auth'])->resource('/contrats', ContratController::class);
    Route::middleware(['auth'])->resource('/trajets', TrajetController::class);
});

// Définir le groupe de routes pour la partie conducteur
Route::group(['prefix' => 'driver', 'middleware' => 'auth'], function () {
    // Route pour afficher le tableau de bord du conducteur
    Route::get('/index', [DriverController::class, 'index'])->name('driver.index');
    // Autres routes pour les fonctionnalités spécifiques du conducteur
});

//Route::delete('/voitures/{car}', [VoitureController::class, 'destroy'])->name('voitures.destroy');

require __DIR__.'/auth.php';
