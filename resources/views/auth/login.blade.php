<!-- resources/views/auth/login.blade.php -->
<!-- @extends('layouts.app') -->

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white text-center py-4 display flex" style="background: linear-gradient(135deg, #6B46C1 0%, #805AD5 100%);">
                    <h3 class="font-weight-bold mb-0">{{ __('Connexion') }}</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Adresse E-mail') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="exemple@email.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">{{ __('Mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div> -->

                        <div class="d-grid gap-2">
                        <div class="card-header bg-gradient-primary text-white text-center py-4 display flex" style="background: linear-gradient(135deg, #6B46C1 0%, #805AD5 100%);">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #6B46C1 0%, #805AD5 100%);">
                                {{ __('Connexion') }}
                            </button>
                        </div>

                        <div class="mt-4 text-center">
                            @if (Route::has('password.request'))
                                <a class="text-primary text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mt-4">
                            <hr>
                            <div class="text-center">
                                <p>Pas encore de compte?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                    {{ __('Créer un compte') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection