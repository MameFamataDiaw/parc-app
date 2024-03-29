@extends('layouts.main')

@section('content')
    <h1>Liste des Réservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Lieu de départ</th>
                <th>Lieu d'arrivée</th>
                <th>Date de réservation</th>
                <th>Passager</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->lieuDeDepart }}</td>
                    <td>{{ $reservation->lieuDarrivee }}</td>
                    <td>{{ $reservation->dateReservation }}</td>
                    <td>{{ $reservation->passager->name }}</td>
                    <td>
                        <!-- Ajoutez ici des liens pour les actions supplémentaires, comme la modification ou la suppression -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
