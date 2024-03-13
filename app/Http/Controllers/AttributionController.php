<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Conducteur;
use App\Models\Attribution;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer toutes les attributions de véhicules aux conducteurs depuis la base de données
        $attributions = Attribution::all();

        // Afficher la vue avec les attributions
        return view('attributions.index', compact('attributions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Récupérer la liste des conducteurs et des véhicules disponibles
        $conducteurs = Conducteur::all();
        $voitures = Voiture::whereNull('conducteur_id')->get();

        // Afficher le formulaire de création d'une nouvelle attribution
        return view('attributions.create', compact('conducteurs', 'voitures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validation des données du formulaire
        $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'voiture_id' => 'required|exists:voitures,id',
            'lieu_depart' => 'required|string',
            'lieu_arrivee' => 'required|string',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
        ]);

        // Vérifier si la voiture a le statut "en panne" ou "inactive"
        $voiture = Voiture::findOrFail($request->voiture_id);
        if ($voiture->statut === 'en panne' || $voiture->statut === 'inactive') {
            return redirect()->back()->with('error', 'Impossible d\'attribuer une voiture en panne ou inactive à un conducteur.');
        }

        // Vérifier si le permis du conducteur est valide
        $conducteur = Conducteur::findOrFail($request->conducteur_id);
        if ($conducteur->dateExpiration < now()) {
            return redirect()->back()->with('error', 'Impossible d\'attribuer un véhicule. Le permis du conducteur a expiré.');
        }

        // Vérifier si la voiture est déjà attribuée à un conducteur
        $existingAttribution = Attribution::where('voiture_id', $request->voiture_id)->first();

        if ($existingAttribution) {
            return redirect()->back()->withInput()->withErrors(['message' => 'La voiture est déjà attribuée à un autre conducteur.']);
        }

        // Vérifier s'il existe déjà une attribution pour la voiture sur la même période
        $existingPeriode = Attribution::where('voiture_id', $request->voiture_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('heure_depart', [$request->heure_depart, $request->heure_arrivee])
                    ->orWhereBetween('heure_arrivee', [$request->heure_depart, $request->heure_arrivee]);
            })
            ->first();

        if ($existingPeriode) {
            return redirect()->back()->withInput()->withErrors(['message' => 'La voiture est déjà attribuée à un autre lieu pour cette période.']);
        }

        // Créer une nouvelle attribution dans la base de données
        Attribution::create([
            'conducteur_id' => $request->conducteur_id,
            'voiture_id' => $request->voiture_id,
            'lieu_depart' => $request->lieu_depart,
            'lieu_arrivee' => $request->lieu_arrivee,
            'heure_depart' => $request->heure_depart,
            'heure_arrivee' => $request->heure_arrivee,
        ]);

        // Rediriger l'utilisateur vers la liste des attributions avec un message de succès
        return redirect()->route('attributions.index')->with('success', 'Attribution de véhicule effectuée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribution $attribution)
    {
        // Récupérer la liste des conducteurs et des véhicules disponibles
        $conducteurs = Conducteur::all();
        $voitures = Voiture::whereNull('conducteur_id')->get();

        // Afficher le formulaire d'édition de l'attribution
        return view('attributions.edit', compact('attribution', 'conducteurs', 'voitures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribution $attribution)
    {
        // Valider les données du formulaire
        $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'voiture_id' => 'required|exists:voitures,id',
            'lieu_depart' => 'required|string',
            'lieu_arrivee' => 'required|string',
            'heure_depart' => 'required|date',
            'heure_arrivee' => 'required|date|after:heure_depart',
        ]);

        // Mettre à jour l'attribution dans la base de données
        $attribution->update($request->all());
        // $attribution->update([
        //     'conducteur_id' => $request->conducteur_id,
        //     'voiture_id' => $request->voiture_id,
        //     'lieu_depart' => $request->lieu_depart,
        //     'lieu_arrivee' => $request->lieu_arrivee,
        //     'heure_depart' => $request->heure_depart,
        //     'heure_arrivee' => $request->heure_arrivee,
        // ]);

        // Rediriger l'utilisateur vers la liste des attributions avec un message de succès
        return redirect()->route('attributions.index')->with('success', 'Attribution de véhicule mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribution $attribution)
    {
        // Supprimer l'attribution de la base de données
        $attribution->delete();

        // Rediriger l'utilisateur vers la liste des attributions avec un message de succès
        return redirect()->route('attributions.index')->with('success', 'Attribution de véhicule supprimée avec succès.');
    }
}
