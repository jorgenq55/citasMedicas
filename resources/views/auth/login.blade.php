@extends('layouts.app')

<div class=wrapper>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2>

        <div class="input-field">
            <input id="email" type="email" placeholder="Ingrese aqui el e-mail"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <input id="password" type="password" placeholder="Ingrese su contraseña"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Recordarme') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Olvidó su contraseña?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
