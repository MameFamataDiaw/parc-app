<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Voiture;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrats = Contrat::all();
        return view('contrats.index', compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conducteurs = Conducteur::all();
        $voitures = Voiture::all();
        return view('contrats.create',compact('conducteurs','voitures'));
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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'dureeDeLocations' => 'required|integer',
            'salaire' => 'required|numeric',
            'conditions' => 'nullable|string',
           
        ]);
        // Création d'un nouveau contrat dans la base de données
        Contrat::create($request->all());

        // Redirection avec un message de succès
        return redirect()->route('contrats.index')->with('success', 'Contrat créé avec succès.');
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
    public function edit(Contrat $contrat)
    {
        $conducteurs = Conducteur::all();
        $voitures = Voiture::all();
        return view('contrats.edit', compact('contrat','conducteurs','voitures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat)
    {
        // Validation des données du formulaire
        $request->validate([
            'conducteur_id' => 'required|exists:conducteurs,id',
            'voiture_id' => 'required|exists:voitures,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'dureeDeLocations' => 'required|integer',
            'salaire' => 'required|numeric',
            'conditions' => 'nullable|string',
        ]);

        // Mise à jour du contrat dans la base de données
        $contrat->update($request->all());

        // Redirection avec un message de succès
        return redirect()->route('contrats.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrat $contrat)
    {
        // Suppression du contrat de la base de données
        $contrat->delete();

        // Redirection avec un message de succès
        return redirect()->route('contrats.index')->with('success', 'Contrat supprimé avec succès.');
    }
}
