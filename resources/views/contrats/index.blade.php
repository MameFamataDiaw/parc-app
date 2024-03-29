@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Liste des contrats</h1>
    <div class="d-flex">
        <a href="{{ route('contrats.create') }}" class="btn btn-primary">Ajouter un nouveau contrat</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Conducteur</th>
            <th scope="col">Voiture</th>
            <th scope="col">Date de debut</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Duree</th>
            <th scope="col">Salaire</th>
            <th scope="col">Conditions</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
            @foreach($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->id }}</th>
                    <td>{{ $contrat->conducteur->nom }} {{ $contrat->conducteur->prenom }}</td>
                    <td>{{ $contrat->voiture->marque }} {{ $contrat->voiture->modele }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->date_fin }}</td>
                    <td>{{ $contrat->dureeContrat }}</td>
                    <td>{{ $contrat->salaire }}</td>
                    <td>{{ $contrat->coditions }}</td>
                    <td><a href="{{ route('contrats.show', $contrat->id) }}" class="btn btn-primary">Voir les détails</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>  
</div>
@endsection