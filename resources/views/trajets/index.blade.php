@extends('layouts.main')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="d-flex">
    <a href="{{ route('trajets.create') }}" class="btn btn-primary">Ajouter une voiture</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Conducteur</th>
      <th scope="col">Lieu depart</th>
      <th scope="col">Lieu arrivee</th>
      <th scope="col">Heure depart</th>
      <th scope="col">Heure d'arrivee</th>
      <th scope="col">Tarif</th>
    </tr>
  </thead>
  <tbody>
    @forelse($trajets as $trajet)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $trajet->conducteur->prenom }} <td>{{ $trajet->conducteur->nom }}</td>
            <td>{{ $trajet->lieu_depart }}</td>
            <td>{{ $trajet->lieu_arrivee }}</td>
            <td>{{ $trajet->heure_depart }}</td>
            <td>{{ $trajet->heure_arrivee }}</td>
            <td>
              <form class="d-inline" action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
              @csrf
              @method('delete')
              {{-- <input type="hidden" name="id" value="{{ $car->id }}"> <!-- Inclure l'ID de la voiture --> --}}
              <button class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer cette voiture')">Supprimer</button>
              </form>
              <a href="{{ route('trajets.edit', $trajet->id) }}" class="btn btn-success">Modifier</a>
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{ $trajet->id }}">Detail</button>
            </td>
          </tr>

        {{-- {{ $car->links() }} --}}
    @empty
        <tr>
            <td colspan="6" class="text-center">
                Aucune donnee
            </td>
        </tr>
    @endforelse
  </tbody>
</table>

{{-- <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="detail{{ $car->id }}" tabindex="-1" aria-labelledby="detail{{ $car->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Nama : {{ $car->name }}</p>
        <p>Plat : {{ $car->plat }}</p>
        <p>Deskripsi : {{ $car->description }}</p>
        <p>Harga : {{ number_format($car->price, 2) }}</p>
        <p>Status : @if($car->status == 1)
          <span class="badge bg-success">Available</span>
        @else
          <span class="badge bg-danger">Not Available</span>
        @endif</p>
        <p>
          <img src="{{ asset('storage/' . $car->image) }}" width="400" alt="">
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}

@endsection