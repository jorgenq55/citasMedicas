@extends('layouts.app')

<div class=wrapper>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
        @endif
        <div class="input-field">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <br>
        <div class="register">
            <button type="submit" class="btn btn-primary">
                {{ __('Enviar me correo de reinicio') }}
            </button>
        </div>
    </form>
<br>
    <div class="register">
        <a class="btn btn-link" href="{{ route('login') }}">
            {{ __('Regresar') }}
        </a>
    </div>
</div>
