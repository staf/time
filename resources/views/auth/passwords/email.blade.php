@extends('layouts.public')

@section('content')
    <h2 class="auth-title">{{ trans('auth.reset') }}</h2>


    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input id="email"
                   type="email"
                   class="form-control"
                   name="email"
                   placeholder="{{ trans('auth.email') }}"
                   title="{{ trans('auth.email') }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ trans('auth.send_reset') }}
        </button>

    </form>

    <p class="card-text small mt-3">
        <a href="{{ route('welcome') }}" class="text-muted">{{ trans('auth.login') }}</a>
    </p>

@endsection
