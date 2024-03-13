@extends('layouts.main')

@section('content')
<h1 class="mt-4">Conducteur</h1>
<ol class="mb-4 breadcrumb">
    <li class="breadcrumb-item active">Modifier conducteur {{ $conducteur->prenom }} {{ $conducteur->nom }}</li>
</ol>
<form action="{{ route('conducteurs.update', $conducteur->id) }}" method="POST" enctype="multipart/form-data">
    @csrf()
    @method('PUT')
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $conducteur->prenom) }}">
    @error('prenom')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $conducteur->nom) }}">
    @error('nom')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="experience" class="form-label">Experience</label>
    <input type="number" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{ old('experience', $conducteur->experience) }}">
    @error('experience')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="numPermis" class="form-label">Numero du permis</label>
    <input type="text" class="form-control @error('numPermis') is-invalid @enderror" id="numPermis" name="numPermis" value="{{ old('numPermis', $conducteur->numPermis) }}">
    @error('numPermis')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="dateEmission" class="form-label">Date emission</label>
    <input type="date" class="form-control @error('dateEmission') is-invalid @enderror" id="dateEmission" name="dateEmission" value="{{ old('dateEmission', $conducteur->dateEmission) }}">
    @error('dateEmission')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="dateExpiration" class="form-label">Date expiration</label>
    <input type="date" class="form-control @error('dateExpiration') is-invalid @enderror" id="dateExpiration" name="dateExpiration" value="{{ old('dateExpiration', $conducteur->dateExpiration) }}">
    @error('dateExpiration')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="categoriePermis" class="form-label">categorie du permis</label>
    <input type="text" class="form-control @error('categoriePermis') is-invalid @enderror" name="categoriePermis" id="categoriePermis" value="{{ old('categoriePermis', $conducteur->categoriePermis) }}">
    @error('categoriePermis')
    <span class="invalid-feedback">
      {{ $message }}
    </span>
    @enderror
  </div>
  {{-- <div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="hidden" name="oldImage" value="{{ $car->image }}">
    @if($car->image)
      <img src="{{ asset('storage/' . $car->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt=""> 
    @else
      <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
    @endif
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" value="{{ old('image', $car->image) }}">
    @error('image') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div> --}}
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-success">Modifier</button>
  </div>
</form>

{{-- <script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script> --}}
@endsection