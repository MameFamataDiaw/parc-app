@extends('layouts.main')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="d-flex">
    <a href="{{ route('contrats.create') }}" class="btn btn-primary">Ajouter un nouveau contrat</a>
</div>
    @foreach($contrats as $contrat)
        <p>{{ $contrat->id }} - {{ $contrat->conducteur->nom }} {{ $contrat->conducteur->prenom }} - {{ $contrat->voiture->marque }} {{ $contrat->voiture->modele }}
            - {{ $contrat->date_debut }} - {{ $contrat->date_fin }} - {{ $contrat->dureeContrat }} - {{ $contrat->salaire }} - {{ $contrat->coditions }}</p>
    @endforeach
@endsection