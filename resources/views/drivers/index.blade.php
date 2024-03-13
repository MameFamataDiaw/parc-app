@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Liste des véhicules attribués</h1>
    @if ($vehicles->isEmpty())
        <p>Aucun véhicule n'est attribué à ce conducteur pour le moment.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Date achat</th>
                    <th>Numero plaque</th>
                    <th>Matricule</th>
                    <th>Kilometrage</th>
                    <th>Prix</th>
                    <!-- Ajoutez d'autres en-têtes de colonne au besoin -->
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->modele }}</td>
                        <td>{{ $vehicle->marque }}</td>
                        <td>{{ $vehicle->dateAchat }}</td>
                        <td>{{ $vehicle->numPlaque }}</td>
                        <td>{{ $vehicle->matricule }}</td>
                        <td>{{ $vehicle->kilometrage }}</td>
                        <td>{{ $vehicle->prix }}</td>
                        <!-- Ajoutez d'autres colonnes au besoin -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
