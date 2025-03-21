<!-- @extends('layouts.app') -->

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-gradient-primary text-white text-center py-4" style="background: linear-gradient(135deg, #6B46C1 0%, #805AD5 100%);">
                    <h3 class="font-weight-bold mb-0">{{ __('Créer un compte') }}</h3>
                    <p class="text-white-50 mb-0">Rejoignez notre communauté</p>
                </div>
                
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">{{ __('Nom complet') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input id="name" type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                    placeholder="Entrez votre nom">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Adresse E-mail') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" 
                                    placeholder="exemple@email.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">{{ __('Mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="new-password" 
                                    placeholder="Minimum 8 caractères">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="text-muted">Le mot de passe doit comporter au moins 8 caractères</small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">{{ __('Confirmer le mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input id="password_confirmation" type="password" class="form-control border-start-0" 
                                    name="password_confirmation" required autocomplete="new-password" 
                                    placeholder="Retapez votre mot de passe">
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg text-white py-3" style="background: linear-gradient(135deg, #6B46C1 0%, #805AD5 100%);">
                                    <i class="bi bi-person-plus me-2"></i>{{ __('Créer mon compte') }}
                                </button>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                {{ __('Vous avez déjà un compte?') }} 
                                <a class="text-decoration-none fw-bold" href="{{ route('login') }}" style="color: #6B46C1;">
                                    {{ __('Connectez-vous') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light py-3 text-center">
                    <p class="text-muted mb-0">En vous inscrivant, vous acceptez nos 
                        <a href="#" class="text-decoration-none" style="color: #6B46C1;">Conditions d'utilisation</a> et notre 
                        <a href="#" class="text-decoration-none" style="color: #6B46C1;">Politique de confidentialité</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection