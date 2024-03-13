<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier le contrat</h1>

    <!-- Formulaire de modification de contrat -->
    <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="conducteur_id">Conducteur :</label>
            <select name="conducteur_id">
                @foreach($conducteurs as $conducteur)
                    <option value="{{ $conducteur->id }}" {{ $conducteur->id == $contrat->conducteur_id ? 'selected' : '' }}>{{ $conducteur->nom }} {{ $conducteur->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="voiture_id">Voiture :</label>
            <select name="voiture_id">
                @foreach($voitures as $voiture)
                    <option value="{{ $voiture->id }}" {{ $voiture->id == $contrat->voiture_id ? 'selected' : '' }}>{{ $voiture->marque }} {{ $voiture->modele }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="date_debut">Date de debut :</label>
            <input type="date" name="date_debut" {{ $contrat->date_debut }}>
        </div>
        <div>
            <label for="date_fin">Date de fin :</label>
            <input type="date" name="date_fin" {{ $contrat->date_fin }}>
        </div>
        <div>
            <label for="date_debut">Duree :</label>
            <input type="number" name="dureeContrat" {{ $contrat->dureeContrat }}>
        </div>
        <div>
            <label for="salaire">Salaire :</label>
            <input type="number" name="salaire" {{ $contrat->salaire }}>
        </div>
        <div>
            <label for="conditions">Conditions :</label>
            <textarea name="conditions" id="conditions" cols="30" rows="10" {{ $contrat->conditions }}></textarea>
        </div>
        <!-- Ajoutez ici les champs restants du contrat -->
        <button type="submit">Modifier le contrat</button>
    </form>
@endsection
