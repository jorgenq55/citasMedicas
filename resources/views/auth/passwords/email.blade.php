@extends('layouts.app')
@extends('plantilla')
@section('content')
    <div class="login-box">
        <div class="login-box-body">

            <p class="login-box-msg">{{ __('Reset Password') }}</p>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Enviar me correo de reinicio') }}
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
