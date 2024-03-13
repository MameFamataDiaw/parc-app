<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index()
    {
        $trajets = Trajet::all();
        return view('trajets.index', compact('trajets'));
    }

    public function create()
    {
        $conducteurs = Conducteur::all();
        return view('trajets.create',compact('conducteurs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'lieu_depart' => 'required|string',
            'lieu_arrivee' => 'required|string',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
            'tarif' => 'required|number',
        ]);
        Trajet::create($data);
            return redirect()->route('trajets.index')->with('success', 'Nouveau trajet publie');
    }

    public function edit(Trajet $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    } 

    public function update(Request $request, Trajet $trajet)
    {
        $data = $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'lieu_depart' => 'required|string',
            'lieu_arrivee' => 'required|string',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
            'tarif' => 'required|number',
        ]);
        $trajet::update($data);
            return redirect()->route('trajets.index')->with('success', 'Nouveau trajet publie');
    }
    public function destroy(Trajet $trajet)
    {
        Conducteur::destroy($trajet->id);
        return redirect()->route('conducteurs.index')->with('success', 'Trajet supprime');
    }
}
