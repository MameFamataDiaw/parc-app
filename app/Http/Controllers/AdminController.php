<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Contrat;
use App\Models\Vehicle;
use App\Models\Voiture;
use App\Models\Contract;
use App\Models\Conducteur;
use App\Models\Attribution;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    // Nombre total de véhicules
    $totalVehicles = Voiture::count();

    // Nombre total de conducteurs
    $totalDrivers = Conducteur::count();

    // Nombre de véhicules en panne
    $vehiclesInBreakdown = Voiture::where('statut', 'en-panne')->count();

    // Nombre de véhicules en marche
    $vehiclesInOperation = Voiture::where('statut', 'en-marche')->count();

    $vehiclesActives = Voiture::where('statut', 'active')->count();

    $vehiclesInactives = Voiture::where('statut', 'inactive')->count();

    return view('admin.dashboard', [
        'totalVehicles' => $totalVehicles,
        'totalDrivers' => $totalDrivers,
        'vehiclesInBreakdown' => $vehiclesInBreakdown,
        'vehiclesInOperation' => $vehiclesInOperation,
        'vehiclesActives' => $vehiclesActives,
        'vehiclesInactives' => $vehiclesInactives,
    ]);
}
}