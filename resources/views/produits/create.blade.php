@extends('layouts.navbarclient')

<link rel="stylesheet" href="styles/produit/create.css">
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title fw-bold">Ajouter un nouveau produit</h2>
                        <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary">
                            Retour aux produits
                        </a>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger border-start border-danger border-4">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div>
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="form-floating">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="form-control" placeholder="Nom du produit">
                                    <label for="name">Nom du produit</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="prix" id="prix" value="{{ old('prix') }}" required step="0.01" min="0"
                                        class="form-control" placeholder="Prix">
                                    <label for="prix">Prix (AR)</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-floating">
                                <textarea name="description" id="description" rows="5" style="height: 120px"
                                    class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="form-floating">
                                    <input type="number" name="quantite" id="quantite" value="{{ old('quantite', 0) }}" required min="0"
                                        class="form-control" placeholder="Quantité">
                                    <label for="quantite">Quantité en stock</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image du produit</label>
                                <div class="input-group mb-1">
                                    <input type="file" name="image" id="image" accept="image/*" 
                                        class="form-control custom-file-input" aria-describedby="image-addon">
                                    <span class="input-group-text" id="image-addon">
                                        <i class="fas fa-image"></i>
                                    </span>
                                </div>
                                <div class="form-text">PNG, JPG, JPEG jusqu'à 2MB</div>
                                <!-- <div id="image-preview" class="mt-3 d-none">
                                    <img src="#" alt="Aperçu de l'image" class="img-thumbnail" style="max-height: 150px;">
                                </div> -->
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                                <i class="fas fa-plus-circle me-2"></i>Ajouter le produit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#image-preview img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection