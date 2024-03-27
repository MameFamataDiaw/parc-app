<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Récupérer les détails de la voiture avec l'ID spécifié
    $car = Voiture::findOrFail($id);

    // Passer les détails de la voiture à la vue de réservation
    return view('reservations.create', ['car' => $car]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lieuDeDepart' => 'required|string',
            'lieuDarrivee' => 'required|string',
            'dateReservation' => 'required|date',
            //'car_id' => 'required|exists:voitures,id'
        ]);

        // Créer une nouvelle instance de réservation avec les données validées
        $reservation = new Reservation();
        $reservation->lieuDeDepart = $validatedData['lieuDeDepart'];
        $reservation->lieuDarrivee = $validatedData['lieuDarrivee'];
        $reservation->dateReservation = $validatedData['dateReservation'];
        $reservation->passager_id = auth()->id(); // Utilisateur connecté en tant que passager
        $reservation->car_id = $request->input('car_id'); // Récupérer l'ID de la voiture à partir du formulaire
        $reservation->save();

        // Redirection vers une autre page après la réservation
        return redirect()->route('passenger.index')->with('success', 'Your reservation has been successfully submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // Récupérer les détails de la voiture avec l'ID spécifié
        // $car = Voiture::findOrFail($id);

        // // Passer les détails de la voiture à la vue de réservation
        // return view('reservations.create', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
