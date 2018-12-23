@extends('layouts.public', ['title' => trans('auth.register')])

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input id="name"
                   type="text"
                   class="form-control"
                   name="name"
                   placeholder="{{ trans('auth.name') }}"
                   title="{{ trans('auth.name') }}"
                   required autofocus>
        </div>

        <div class="form-group">
            <input id="email"
                   type="email"
                   class="form-control"
                   name="email"
                   placeholder="{{ trans('auth.email') }}"
                   title="{{ trans('auth.email') }}"
                   required>
        </div>

        <div class="form-group">
            <input id="password"
                   type="password"
                   class="form-control"
                   name="password"
                   placeholder="{{ trans('auth.password') }}"
                   title="{{ trans('auth.password') }}"
                   required>
        </div>

        <div class="form-group">
            <input id="password-confirm"
                   type="password"
                   class="form-control"
                   name="password_confirmation"
                   placeholder="{{ trans('auth.password_confirmation') }}"
                   title="{{ trans('auth.password_confirmation') }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ trans('auth.register') }}
        </button>
    </form>

    <p class="card-text small pt-4">
        <a class="text-muted" href="{{ route('welcome') }}">
            {{ trans('auth.login') }}
        </a>
    </p>

@endsection
