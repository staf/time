@extends('layouts.public')
@section('content')

    <h2 class="auth-title">{{ trans('auth.login') }}</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input id="email"
                   type="email"
                   class="form-control form-control-lg"
                   name="email"
                   placeholder="{{ trans('auth.email') }}"
                   title="{{ trans('auth.email') }}"
                   required autofocus>
        </div>

        <div class="form-group">
            <input id="password"
                   type="password"
                   class="form-control form-control-lg"
                   name="password"
                   placeholder="{{ trans('auth.password') }}"
                   title="{{ trans('auth.password') }}"
                   required>
        </div>

        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label" for="remember">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember">
                    {{ trans('auth.remember') }}
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ trans('auth.login') }}
        </button>
    </form>

    <p class="card-text small mt-3">
        <a class="text-muted" href="{{ route('password.request') }}">
            {{ trans('auth.forgot') }}
        </a>
    </p>

@endsection
