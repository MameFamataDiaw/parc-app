<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        // 1. Récupérer l'ID du conducteur actuellement connecté
        $driverId = Auth::id();

        // 2. Utiliser cet ID pour rechercher les attributions de véhicules pour ce conducteur
        $attributions = Attribution::where('conducteur_id', $driverId)->get();

        // 3. Récupérer les détails des véhicules attribués
        $vehicles = new Collection();
        foreach ($attributions as $attribution) {
            $vehicles[] = $attribution->voiture;
        }

        // 4. Passer ces détails à la vue correspondante pour les afficher
        return view('drivers.index', compact('vehicles'));
    }
}
