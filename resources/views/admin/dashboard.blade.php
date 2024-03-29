@extends('layouts.main')
@section('content')
  {{-- <h1 class="mt-4">Dashboard</h1>
  <ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol> --}}
<div class="container">
    <h1>Tableau de bord</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    
                    {{-- <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-taxi"></i></span> --}}
                    <h5 class="card-title">Nombre de véhicules</h5>
                    <p class="card-text">{{ $totalVehicles }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nombre de conducteurs</h5>
                    <p class="card-text">{{ $totalDrivers }}</p>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Véhicules en panne</h5>
                    <p class="card-text">{{ $vehiclesInBreakdown }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Véhicules en marche</h5>
                    <p class="card-text">{{ $vehiclesInOperation }}</p>
                </div>
            </div>
        </div> --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Véhicules actives</h5>
                    <p class="card-text">{{ $vehiclesActives }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Véhicules en marche</h5>
                    <p class="card-text">{{ $vehiclesInactives }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection