@extends('layouts.main')
@section('content')

<div class="container px-4 px-lg-5 mt-5 card rounded-0 card-outline card-purple shadow">
    <div class="d-flex">
        <a href="{{ route('reservations.index') }}" class="btn btn-primary">Voir mes reservations</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h1 class="display-4 fw-bolder">Voitures diponibles</h1>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="search" id="search" class="form-control" placeholder="Search Here..." aria-label="Search Here" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-success" id="basic-addon2"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-3" id="">
                @foreach ($activeCars as $car)
                <a class="col item text-decoration-none text-dark book_cab" href="{{ route('reservations.create', ['id' => $car->id]) }}">
                    <div class="callout callout-primary border-success rounded-0">
                        <dl>
                            <dt class="h3"><i class="fa fa-taxi"></i> {{ $car->modele }}</dt>
                            <dd class="truncate-3 text-muted lh-1">
                                <small>{{ $car->marque }}</small><br>
                                <small>{{ $car->matricule }}</small>
                            </dd>
                        </dl>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
