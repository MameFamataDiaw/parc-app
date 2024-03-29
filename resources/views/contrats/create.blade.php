<!-- create.blade.php -->

@extends('layouts.main')

@section('content')
<h1 class="mt-4">Contrat</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Ajouter un contrat</li>
</ol>
    <!-- Formulaire de création de contrat -->
    <form action="{{ route('contrats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="conducteur_id" class="form-label">Conducteur</label>
            <select class="form-select @error('conducteur_id') is-invalid @enderror" id="conducteur_id" name="conducteur_id">
                <option value="">Choisir un conducteur</option>
                @foreach($conducteurs as $conducteur)
                  <option value="{{ $conducteur->id }}">{{ $conducteur->prenom }} {{ $conducteur->nom }}</option>
                @endforeach
            </select>
            @error('conducteur_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="voiture_id" class="form-label">Voiture</label>
            <select class="form-select @error('voiture_id') is-invalid @enderror" id="voiture_id" name="voiture_id">
                <option value="">Choisir une voiture</option>
                @foreach($voitures as $voiture)
                  <option value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}</option>
                @endforeach
            </select>
            @error('voiture_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_debut" class="form-label">Date debut :</label>
            <input type="date" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
            @error('date_debut')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date fin :</label>
            <input type="date" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
            @error('date_fin')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="duree" class="form-label">Duree :</label>
            <input type="number" class="form-control @error('dureeContrat') is-invalid @enderror" id="dureeContrat" name="dureeContrat" value="{{ old('dureeContrat') }}">
            @error('dureeContrat')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="salaire" class="form-label">Salaire :</label>
            <input type="number" class="form-control @error('salaire') is-invalid @enderror" id="salaire" name="salaire" value="{{ old('salaire') }}">
            @error('salaire')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="conditions" class="form-label">Conditions :</label>
            <textarea name="conditions" id="conditions" cols="30" rows="10" class="form-control @error('conditions') is-invalid @enderror" id="conditions" name="conditions" value="{{ old('conditions') }}"></textarea>
            @error('conditions')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div class="d-flex justify-content-end">
        <!-- Ajoutez ici les champs restants du contrat -->
        <button type="submit" class="btn btn-primary">Créer le contrat</button>
        @if ($contrat->id)
            <a href="{{ route('contrats.generate-pdf', $contrat) }}" class="btn btn-primary">Générer PDF</a>
        @endif

    </form>
@endsection
