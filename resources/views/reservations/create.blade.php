@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <input type="hidden" name="voiture_id" value="{{ $car->id }}">
        <div class="form-group">
            <label for="lieuDeDepart" class="control-label">Lieu de depart</label>
            <textarea name="lieuDeDepart" id="lieuDeDepart" rows="2" class="form-control form-control-sm rounded-0" required></textarea>
        </div>
        <div class="form-group">
            <label for="lieuDarrivee" class="control-label">Lieu d'arrivee</label>
            <textarea name="lieuDarrivee" id="lieuDarrivee" rows="2" class="form-control form-control-sm rounded-0" required></textarea>
        </div>
        <div class="form-group">
            <label for="dateReservation" class="control-label">Lieu de depart</label>
            <input type="date" id="dateReservation" name="dateReservation" class="form-control form-control-sm rounded-0" required  >
        </div>
        <button type="button" class="btn btn-secondary">Annuler</button> 
        <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>
</div>
    
@endsection