@extends('layouts.login')

@section('form-login')
    <form class="m-t"
          role="form"
          method="POST"
          action="{{ route('login') }}"
          autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="email"
                   class="col-form-label text-md-end">{{ __('Email Address') }}</label>
            <input id="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password"
                   class="col-form-label text-md-end">{{ __('Password') }}</label>
            <input id="password"
                   type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   required
                   autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="i-checks">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit"
                class="btn btn-primary block full-width m-b">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
@endsection
