@extends('layouts.main')

@section('content')
<h1 class="mt-4">Conducteur</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Ajouter un conducteur</li>
</ol>
<form action="{{ route('conducteurs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    {{-- <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <img src="" class="mb-3 img-preview img-fluid col-sm-5" alt="">
        <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
        @error('photo') 
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div> --}}
  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
    @error('nom')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}">
    @error('prenom')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="experience" class="form-label">Experience</label>
    <input type="text" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{ old('experience') }}">
    @error('experience')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="numPermis" class="form-label">Numero de permis</label>
    <input type="text" class="form-control @error('numPermis') is-invalid @enderror" id="numPermis" name="numPermis" value="{{ old('numPermis') }}">
    @error('numPermis')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="dateEmission" class="form-label">Date emission</label>
    <input type="date" class="form-control @error('dateEmission') is-invalid @enderror" id="dateEmission" name="dateEmission" value="{{ old('dateEmission') }}">
    @error('dateEmission')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="dateExpiration" class="form-label">Date expiration</label>
    <input type="date" class="form-control @error('dateExpiration') is-invalid @enderror" id="dateExpiration" name="dateExpiration" value="{{ old('dateExpiration') }}">
    @error('dateExpiration')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="categoriePermis" class="form-label">categorie du permis</label>
    <input type="text" class="form-control @error('categoriePermis') is-invalid @enderror" name="categoriePermis" id="categoriePermis" value="{{ old('categoriePermis') }}">
    @error('categoriePermis')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>
@endsection