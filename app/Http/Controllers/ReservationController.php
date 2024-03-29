<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
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
            'voiture_id' => 'required|exists:voitures,id'
        ]);

        // Récupérer l'ID de l'utilisateur actuellement connecté
        $userId = Auth::id();

        // Créer une nouvelle instance de réservation avec les données validées
        $reservation = new Reservation();
        $reservation->lieuDeDepart = $validatedData['lieuDeDepart'];
        $reservation->lieuDarrivee = $validatedData['lieuDarrivee'];
        $reservation->dateReservation = $validatedData['dateReservation'];
        $reservation->passager_id = $userId; // Associer l'ID de l'utilisateur à la réservation
        $reservation->voiture_id = $validatedData['voiture_id']; // Récupérer l'ID de la voiture à partir du formulaire
        //$reservation->voiture_id = $request->input('voiture_id'); // Récupérer l'ID de la voiture à partir du formulaire
        $reservation->save();

        // Redirection vers une autre page après la réservation
        return redirect()->route('reservations.index')->with('success', 'Your reservation has been successfully submitted!');
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
