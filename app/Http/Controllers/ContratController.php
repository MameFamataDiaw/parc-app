<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
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
        $contrat = new Contrat();
        $conducteurs = Conducteur::all();
        $voitures = Voiture::all();
        return view('contrats.create',compact('contrat','conducteurs','voitures'));
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
            'dureeContrat' => 'required|integer',
            'salaire' => 'required|numeric',
            'conditions' => 'nullable|string',
           
        ]);
        // Création d'un nouveau contrat dans la base de données
        $contrat = Contrat::create($request->all());

        // Redirection vers la page de détails du contrat avec un message de succès
        return redirect()->route('contrats.show', $contrat)->with('success', 'Contrat créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Récupérer le contrat à afficher en fonction de son ID
        $contrat = Contrat::findOrFail($id);

        // Passer le contrat à la vue appropriée pour l'affichage des détails
        return view('contrats.show', compact('contrat'));
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
            'dureeContrat' => 'required|integer',
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

    public function generatePdf(Contrat $contrat)
    {
        // Récupérer les données du contrat
        $data = [
            'contrat' => $contrat,
        ];

        // Générer le contenu HTML pour le contrat
        $html = view('contrats.pdf', $data)->render();

        // Créer une instance de Dompdf
        $dompdf = new Dompdf();

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Rendre le PDF
        $dompdf->render();

        // Retourner le PDF en réponse
        return $dompdf->stream('contrat.pdf');
    }

}
