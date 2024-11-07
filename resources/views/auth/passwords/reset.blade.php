@extends('layouts.app')

<div class="wrapper">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-field">
                <input id="email" type="email"  @error('email') is-invalid @enderror name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <label for="email" >{{ __('Correo') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>

        <div class="input-field">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="Nueva Password">
                <label for="password" >{{ __('Contraseña') }}</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>

        <div class="input-field">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
                <label for="password-confirm" >{{ __('Confirmar Contraseña') }}</label>
        </div>

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Reiniciar Contraseña') }}
            </button>
        </div>
    </form>
</div>