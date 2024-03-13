@extends('layouts.main')

@section('content')
<h1 class="mt-4">Voiture</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Ajouter une voiture</li>
</ol>
<form action="{{ route('voitures.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <img src="" class="mb-3 img-preview img-fluid col-sm-5" alt="">
        <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
        @error('photo') 
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div>
  <div class="mb-3">
    <label for="modele" class="form-label">Modele</label>
    <input type="text" class="form-control @error('modele') is-invalid @enderror" id="modele" name="modele" value="{{ old('modele') }}">
    @error('modele')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="marque" class="form-label">Marque</label>
    <input type="text" class="form-control @error('marque') is-invalid @enderror" id="marque" name="marque" value="{{ old('marque') }}">
    @error('marque')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="dateAchat" class="form-label">Date achat</label>
    <input type="date" class="form-control @error('dateAchat') is-invalid @enderror" id="dateAchat" name="dateAchat" value="{{ old('dateAchat') }}">
    @error('dateAchat')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="numPlaque" class="form-label">Numero plaque</label>
    <input type="text" class="form-control @error('numPlaque') is-invalid @enderror" name="numPlaque" id="numPlaque" value="{{ old('numPlaque') }}">
    @error('numPlaque')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="matricule" class="form-label">Matricule</label>
    <input type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" id="matricule" value="{{ old('matricule') }}">
    @error('matricule')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="kilometrage" class="form-label">Kilometrage</label>
    <input type="number" class="form-control @error('kilometrage') is-invalid @enderror" name="kilometrage" id="kilometrage" value="{{ old('kilometrage') }}">
    @error('kilometrage')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" id="prix" value="{{ old('prix') }}">
    @error('prix')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="statut" class="form-label">Statut</label>
    <select class="form-select" id="statut" name="statut">
    <option selected value="inactive">Inactive</option>
    <option value="active">Active</option>
    <option value="en panne">en panne</option>
    <option value="en marche">en marche</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="conducteur_id" class="form-label">Conducteur</label>
    <select class="form-select @error('conducteur_id') is-invalid @enderror" id="conducteur_id" name="conducteur_id">
        <option value="">Choisir un conducteur</option>
        @foreach($conducteurs as $conducteur)
          <option value="{{ $conducteur->id }}">{{ $conducteur->prenom }} {{ $conducteur->nom }}</option>
        @endforeach
    </select>
    @error('conducteur_id')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>

<script>
  function previewImage(){
    const image = document.querySelector('#photo');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(photo.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection