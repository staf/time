@extends('layouts.public')

@section('content')
    <h2 class="auth-title">{{ trans('auth.reset') }}</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input id="email"
                   type="email"
                   class="form-control"
                   name="email"
                   placeholder="{{ trans('auth.email') }}"
                   title="{{ trans('auth.email') }}"
                   required autofocus>
        </div>

        <div class="form-group">
            <input id="password"
                   type="password"
                   class="form-control"
                   name="password"
                   placeholder="{{ trans('auth.new_password') }}"
                   title="{{ trans('auth.new_password') }}"
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

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ trans('auth.reset') }}
                </button>
            </div>
        </div>
    </form>

@endsection
