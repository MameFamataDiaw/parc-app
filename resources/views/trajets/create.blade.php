@extends('layouts.main')

@section('content')
<h1 class="mt-4">Trajet</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Ajouter un trajet</li>
</ol>
<form action="{{ route('trajets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="mb-3">
        <label for="conducteur" class="form-label">Conducteur</label>
        <select class="form-select @error('conducteur_id') is-invalid @enderror" id="conducteur" name="conducteur_id">
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
        <label for="lieu_depart" class="form-label">Lieu de depart</label>
        <input type="text" class="form-control @error('lieu_depart') is-invalid @enderror" id="lieu_depart" name="lieu_depart" value="{{ old('lieu_depart') }}">
        @error('lieu_depart')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="lieu_arrivee" class="form-label">Lieu de depart</label>
        <input type="text" class="form-control @error('lieu_arrivee') is-invalid @enderror" id="lieu_arrivee" name="lieu_arrivee" value="{{ old('lieu_arrivee') }}">
        @error('lieu_arrivee')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="heure_depart" class="form-label">Heure de depart</label>
        <input type="date" class="form-control @error('heure_depart') is-invalid @enderror" id="heure_depart" name="heure_depart" value="{{ old('heure_depart') }}">
        @error('heure_depart')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="heure_arrivee" class="form-label">Heure d'arrivee</label>
        <input type="date" class="form-control @error('heure_arrivee') is-invalid @enderror" id="lheure_arrivee" name="heure_arrivee" value="{{ old('heure_arrivee') }}">
        @error('heure_arrivee')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tarif" class="form-label">Tarif</label>
        <input type="number" class="form-control @error('tarif') is-invalid @enderror" name="tarif" id="tarif" value="{{ old('tarif') }}">
        @error('tarif')
        <span class="invalid-feedback">
          {{ $message }}
        </span>
        @enderror
      </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>
@endsection