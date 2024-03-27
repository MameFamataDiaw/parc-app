@extends('layouts.main')

@section('content')
    <h1>Attribuer une voiture à un conducteur</h1>
    
    <form action="{{ route('attributions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="conducteur">Sélectionner un conducteur :</label>
            <select class="form-control" id="conducteur" name="conducteur_id">
                @foreach ($conducteurs as $conducteur)
                    <option value="{{ $conducteur->id }}">{{ $conducteur->prenom }} {{ $conducteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="voiture">Véhicules disponibles :</label><br>
            @foreach ($voitures as $voiture)
                <input type="checkbox" id="voiture{{ $voiture->id }}" name="voiture_id" value="{{ $voiture->id }}">
                <label for="voiture{{ $voiture->id }}">{{ $voiture->marque }} - {{ $voiture->modele }}</label><br>
            @endforeach
        </div>

        <div class="form-group">
            <label for="lieu_depart">Lieu de départ</label>
            <input type="text" name="lieu_depart" class="form-control" value="{{ old('lieu_depart') }}">
        </div>
        <div class="form-group">
            <label for="lieu_arrivee">Lieu d'arrivée</label>
            <input type="text" name="lieu_arrivee" class="form-control" value="{{ old('lieu_arrivee') }}">
        </div>
        <div class="form-group">
            <label for="heure_depart">Heure de départ</label>
            <input type="datetime-local" name="heure_depart" class="form-control" value="{{ old('heure_depart') }}">
        </div>
        <div class="form-group">
            <label for="heure_arrivee">Heure d'arrivée</label>
            <input type="datetime-local" name="heure_arrivee" class="form-control" value="{{ old('heure_arrivee') }}">
        </div>
        
        {{-- <!-- Bouton pour ouvrir le modal de création du contrat -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContrat">
            Ajouter un contrat
        </button> --}}
        <a href="{{ route('contrats.create') }}" class="btn btn-primary">Etablir un cntrat</a>
        <button type="submit" class="btn btn-primary">Attribuer la voiture</button>
    </form>

    <!-- Modal pour la création du contrat -->
<div class="modal fade" id="modalContrat" tabindex="-1" role="dialog" aria-labelledby="modalContratLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContratLabel">Créer un nouveau contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire pour la création du contrat -->
                <form action="{{ route('contrats.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="date_debut">Date de debut :</label>
                        <input type="date" name="date_debut">
                    </div>
                    <div>
                        <label for="dureeDeLocations">Duree :</label>
                        <input type="number" name="dureeDeLocations">
                    </div>
                    <div>
                        <label for="date_fin">Date de fin :</label>
                        <input type="date" name="date_fin">
                    </div>
                    <div>
                        <label for="salaire">Salaire :</label>
                        <input type="number" name="salaire">
                    </div>
                    <div>
                        <label for="conditions">Conditions :</label>
                        <textarea name="conditions" id="conditions" cols="30" rows="10"></textarea>
                    </div>

                    <!-- Champs cachés pour les informations du conducteur et du véhicule -->
                    <input type="hidden" name="conducteur_id" value="{{ $conducteur->id }}">
                    <input type="hidden" name="voiture_id" value="{{ $voiture->id }}">

                    <!-- Bouton de soumission du formulaire -->
                    <button type="submit" class="btn btn-primary">Créer le contrat</button>
                </form>
            </div>
        </div>
    </div>
</div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
