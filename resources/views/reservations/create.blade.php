@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        <div class="form-group">
            <label for="lieu_depart" class="control-label">Lieu de depart</label>
            <textarea name="lieu_depart" id="lieu_depart" rows="2" class="form-control form-control-sm rounded-0" required></textarea>
        </div>
        <div class="form-group">
            <label for="lieu_darrivee" class="control-label">Lieu d'arrivee</label>
            <textarea name="lieu_darrivee" id="lieu_darrivee" rows="2" class="form-control form-control-sm rounded-0" required></textarea>
        </div>
        <div class="form-group">
            <label for="date_reservation" class="control-label">Lieu de depart</label>
            <input type="date" id="date_reservation" name="date_reservation" class="form-control form-control-sm rounded-0" required  >
        </div>
        <button type="button" class="btn btn-secondary">Annuler</button> 
        <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>
</div>
    
@endsection