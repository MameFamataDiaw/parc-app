<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Conducteur;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Voiture::latest()->paginate(10);
        return view('voitures.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conducteurs = Conducteur::all();
        return view('voitures.create', compact('conducteurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'modele'  =>  'required',
            'marque'  =>  'required',
            'dateAchat'  =>  'required|date',
            'numPlaque'  =>  'required',
            'matricule'  =>  'required',
            'kilometrage'  =>  'required|numeric',
            'prix'  =>  'required|numeric',
            'statut'  =>  'required|in:en panne,en marche,active,inactive',
            'conducteur_id'  =>  [
                'required',
                function ($attribute, $value, $fail) {
                    $conducteur = Conducteur::findOrFail($value);
                    if (now()->greaterThan($conducteur->dateExpiration)) {
                        $fail('Le permis du conducteur a expiré. Veuillez sélectionner un conducteur avec un permis valide.');
                    }
                },
            ],
        ]);

        // Vérifier le statut de la voiture
        $statut = $request->input('statut');
        if ($statut === 'inactive' || $statut === 'en panne') {
            // Si le statut est 'inactive' ou 'en panne', ne pas valider ni enregistrer le conducteur
            $data = $request->except('conducteur_id');
        } else {
            // Sinon, inclure le conducteur_id dans les données à valider et enregistrer
            $data = $request->all();
        }

        // Télécharger et stocker l'image
        $image = $request->file('photo');
        $imageName = time().'.'.$image->extension();
        $image = public_path('images/voitures/'.$imageName);

        // // Redimensionnement de l'image
        // $resizedImage = Image::make($image)->resize(300, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        // // Sauvegarde de l'image redimensionnée
        // $resizedImage->save($imagePath);

        // Créer une nouvelle voiture avec le chemin de l'image
        // $voiture = new Voiture([
        //     'photo' => 'images/voitures/'.$imageName,
        //     'modele' => $request->get('modele'),
        //     'marque' => $request->get('marque'),
        //     'dateAchat' => $request->get('dateAchat'),
        //     'matricule' => $request->get('matricule'),
        //     'kilometrage' => $request->get('kilometrage'),
        //     'prix' => $request->get('prix'),
        //     'statut' => $request->get('statut'),
        //     'conducteur_id' => $request->get('conducteur_id'),
        // ]);
        // Créer une nouvelle voiture avec les données
        $voiture = new Voiture($data);
        $voiture->save();

        return redirect()->route('voitures.index')->with('success', 'Voiture ajoutée avec succès.');
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
    public function edit(Voiture $car)
    {
        return view('voitures.edit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $car)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'modele'  =>  'required',
            'marque'  =>  'required',
            'dateAchat'  =>  'required|date',
            'numPlaque'  =>  'required',
            'matricule'  =>  'required',
            'kilometrage'  =>  'required|numeric',
            'prix'  =>  'required|numeric',
            'statut'  =>  'required|in:en panne,en marche,active,inactive',
            'conducteur_id' => [
                'required',
                // function ($attribute, $value, $fail) {
                //     $conducteur = Conducteur::findOrFail($value);
                //     if (now()->greaterThan($conducteur->dateExpiration)) {
                //         $fail('Le permis du conducteur a expiré. Veuillez sélectionner un conducteur avec un permis valide.');
                //     }
                // },
            ],
        ]);
        $car->update($data);
        return redirect()->route('voitures.index')->with('success', 'modification reuissie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $car)
    {
        Voiture::destroy($car->id);
        //$car->delete(); // Utilisez delete() pour supprimer l'enregistrement
        return redirect()->route('voitures.index')->with('success', 'Suppression reussie');
    }
}
