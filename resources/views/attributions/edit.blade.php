@extends('layouts.main')

@section('content')
    <h1>Modifier l'attribution de véhicule</h1>

    <form action="{{ route('attributions.update', $attribution->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="conducteur">Conducteur :</label>
            <select class="form-control" id="conducteur" name="conducteur_id">
                @foreach ($conducteurs as $conducteur)
                    <option value="{{ $conducteur->id }}" {{ $attribution->conducteur_id == $conducteur->id ? 'selected' : '' }}>{{ $conducteur->prenom }} {{ $conducteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="voiture">Voiture :</label>
            <select class="form-control" id="voiture" name="voiture_id">
                @foreach ($voitures as $voiture)
                    <option value="{{ $voiture->id }}" {{ $attribution->voiture_id == $voiture->id ? 'selected' : '' }}>{{ $voiture->marque }} - {{ $voiture->modele }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lieu_depart">Lieu de départ :</label>
            <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" value="{{ $attribution->lieu_depart }}">
        </div>

        <div class="form-group">
            <label for="lieu_arrivee">Lieu d'arrivée :</label>
            <input type="text" class="form-control" id="lieu_arrivee" name="lieu_arrivee" value="{{ $attribution->lieu_arrivee }}">
        </div>

        <div class="form-group">
            <label for="heure_depart">Heure de départ :</label>
            <input type="datetime-local" class="form-control" id="heure_depart" name="heure_depart" value="{{ date('Y-m-d\TH:i', strtotime($attribution->heure_depart)) }}">
        </div>

        <div class="form-group">
            <label for="heure_arrivee">Heure d'arrivée :</label>
            <input type="datetime-local" class="form-control" id="heure_arrivee" name="heure_arrivee" value="{{ date('Y-m-d\TH:i', strtotime($attribution->heure_arrivee)) }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection
