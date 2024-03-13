@extends('layouts.main')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="d-flex">
    <a href="{{ route('conducteurs.create') }}" class="btn btn-primary">Ajouter un conducteur</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Experience</th>
      <th scope="col">Numero de permis</th>
      <th scope="col">Date emission</th>
      <th scope="col">Date expiration</th>
      <th scope="col">Categorie de permis</th>
    </tr>
  </thead>
  <tbody>
    @forelse($conducteurs as $conducteur)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            {{-- <td><img src="{{ asset($photo->photo) }}" alt="{{ $car->modele }}"></td> --}}
            <td>{{ $conducteur->nom }}</td>
            <td>{{ $conducteur->prenom }}</td>
            <td>{{ $conducteur->experience }}</td>
            <td>{{ $conducteur->numPermis }}</td>
            <td>{{ $conducteur->dateEmission }}</td>
            <td>{{ $conducteur->dateExpiration }}</td>
            <td>{{ $conducteur->categoriePermis }}</td>
            <td>
              <form class="d-inline" action="{{ route('conducteurs.destroy', $conducteur->id) }}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger" onclick="return confirm('Supprimer ce conducteur?')">Supprimer</button>
              </form>
              <a href="{{ route('conducteurs.edit', $conducteur->id) }}" class="btn btn-success">Edit</a>
              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{ $conducteur->id }}">Detail</button>
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

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="detail{{ $conducteur->id }}" tabindex="-1" aria-labelledby="detail{{ $conducteur->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <p>Nom : {{ $conducteur->nom }}</p>
    <p>Prenom : {{ $conducteur->prenom }}</p>
    <p>Experience: {{ $conducteur->experience }}</p>
    <p>Numero du permis : {{ $conducteur->numPermis }}</p>
    <p>Date emission : {{ $conducteur->dateEmission }}</p>
    <p>Date expiration : {{ $conducteur->dateExpiration }}</p>
    <p>Categorie du permis : {{ $conducteur->categoriePermis }}</p>
    <p>
    <img src="{{ asset('storage/' . $car->image) }}" width="400" alt="">
    </p>
</div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>

@endsection