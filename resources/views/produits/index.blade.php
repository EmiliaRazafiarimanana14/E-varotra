@extends('layouts.navbarclient')

@section('styles')
<link rel="stylesheet" href="{{ asset('produit/produits.css') }}">
@endsection

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Nos Produits</h2>
        <a href="#" class="btn btn-outline-primary">
            <i class="bi bi-cart"></i> 
            Panier <span class="badge bg-primary">{{ count(session('cart', [])) }}</span>
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="row g-4">
        @foreach($produits as $produit)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card product-card shadow-sm">
                    <div class="product-img-container">
                        <img src="{{ $produit->image_url }}" class="product-img" alt="{{ $produit->name }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="product-title">{{ $produit->name }}</h5>
                        <p class="product-desc">{{ \Illuminate\Support\Str::limit($produit->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-2">
                            <span class="product-price">{{ number_format($produit->prix, 2) }} €</span>
                            <span class="stock-badge {{ $produit->quantite > 0 ? 'in-stock' : 'out-stock' }}">
                                {{ $produit->quantite > 0 ? 'En stock' : 'Épuisé' }}
                            </span>
                        </div>
                        <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="add-to-cart-btn" {{ $produit->quantite <= 0 ? 'disabled' : '' }}>
                                <i class="bi bi-cart-plus me-1"></i> Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection