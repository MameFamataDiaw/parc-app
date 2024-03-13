<?php

namespace App\Http\Controllers;

use App\Models\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conducteurs = Conducteur::latest()->paginate(10);
        return view('conducteurs.index', compact('conducteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conducteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'  =>  'required',
            'prenom'  =>  'required',
            'experience'  =>  'required|integer',
            'numPermis'  =>  'required',
            'dateEmission'  =>  'required|date',
            'dateExpiration'  =>  'required|date',
            'categoriePermis'  =>  'required',
            ]);
              Conducteur::create($data);
              return redirect()->route('conducteurs.index')->with('success', 'Nouveau conducteur');
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
    public function edit(Conducteur $conducteur){
        return view('conducteurs.edit', ['conducteur'=> $conducteur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conducteur $conducteur){
        $data = $request->validate([
            'nom'  =>  'required',
            'prenom'  =>  'required',
            'experience'  =>  'required|integer',
            'numPermis'  =>  'required',
            'dateEmission'  =>  'required|date',
            'dateExpiration'  =>  'required|date',
            'categoriePermis'  =>  'required',
        ]);
        // if($request->file('image')){
        // if($request->oldImage){
        // Storage::delete($request->oldImage);
        // }
        // $data['image'] = $request->file('image')->store('cars');
        // }
        $conducteur->update($data);
        return redirect()->route('conducteurs.index')->with('success', 'Donnees du conducteur modifiees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Conducteur $conducteur)
    {
        Conducteur::destroy($conducteur->id);
        return redirect()->route('conducteurs.index')->with('success', 'Conducteur supprime');   
    }
}
