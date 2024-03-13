<!-- resources/views/attribution/index.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Liste des attributions</h1>
        <div class="d-flex">
            <a href="{{ route('attributions.create') }}" class="btn btn-primary">Faire une attribution</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Conducteur</th>
                    <th>Voiture</th>
                    <th>Date d'attribution</th>
                    <th>Lieu et heure de depart</th>
                    <th>Lieu et heure d'arrivee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributions as $attribution)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attribution->conducteur->prenom }} {{ $attribution->conducteur->nom }}</td>
                        <td>{{ $attribution->voiture->modele }} ({{ $attribution->voiture->matricule }})</td>
                        <td>{{ $attribution->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $attribution->lieu_depart }} ({{ $attribution->heure_depart }})</td>
                        <td>{{ $attribution->lieu_arrivee }} ({{ $attribution->heure_arrivee }})</td>
                        
                        <td>
                            <!-- Bouton pour supprimer l'attribution -->
                            <form action="{{ route('attributions.destroy', $attribution->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <a href="{{ route('attributions.edit', $attribution->id) }}" class="btn btn-success">Modifier</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
