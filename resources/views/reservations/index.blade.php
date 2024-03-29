@extends('layouts.main')
@section('content')
<div class="content py-5 mt-5">
    <div class="container">
        <div class="card card-outline card-purple shadow rounded-0">
            <div class="card-header">
                <h4 class="card-title">Mes reservations</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <colgroup>
                        <col width="5%">
                        <col width="15%">
                        <col width="20%">
                        <col width="20%">
                        {{-- <col width="10%"> --}}
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr class="bg-gradient-dark text-dark">
                            <th class="text-center">#</th>
                            <th class="text-center">Date reservation</th>
                            <th class="text-center">Lieux</th>
                            <th class="text-center">Voiture</th>
                            {{-- <th class="text-center">Statut</th> --}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $reservation->dateReservation }}</td>
                            <td>
                                <p class="m-0 truncate-1"><b>Pickup:{{ $reservation->lieuDeDepart }}</b></p>
                                <p class="m-0 truncate-1"><b>Dropoff:{{ $reservation->lieuDarrivee }}</b></p>
                            </td>
                            <td>
                                <p class="m-0 truncate-1"><b>Modele:{{ $reservation->voiture->modele }}</b></p>
                                <p class="m-0 truncate-1"><b>Marque:{{ $reservation->voiture->marque }}</b></p>
                            </td>
                            {{-- <td class="text-center">{{ $reservation->statut }}</td> --}}
                            <td class="text-center">
                                <button type="button" class="btn btn-flat btn-info border btn-sm view_data" data-id="">Annuler</button>
                            </td>
                        </tr>
                    </tbody>
                        @endforeach
                </table>
            </div>  
        </div>
    </div>
</div>

@endsection