@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Détails du contrat</h1>
        <p>ID du contrat : {{ $contrat->id }}</p>
        <p>Date de début : {{ $contrat->date_debut }}</p>
        <p>Date de fin : {{ $contrat->date_fin }}</p>
        <p>Conducteur : {{ $contrat->conducteur->prenom }} {{ $contrat->conducteur->nom }}</p>
        <p>Conducteur : {{ $contrat->voiture->marque }} {{ $contrat->voiture->modele }}</p>
        <p>Duree : {{ $contrat->dureeContrat }} </p>
        <p>Conditions : {{ $contrat->coditions }} </p>
        <p>Salaire : {{ $contrat->salaire }} </p>
        <a href="{{ route('contrats.generate-pdf', $contrat->id) }}" class="btn btn-primary">Télécharger PDF</a>


</div>
@endsection