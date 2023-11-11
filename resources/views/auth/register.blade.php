@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<form class="card card-md" method="POST" action="{{ route('register', app()->getLocale()) }}">
    @csrf
    <div class="card-body">
        <div class="text-center">
            <img  data-bs-toggle="tooltip" data-bs-placement="right" title="Tunnel CRM" src="{{ asset('template/static/tunnelcrm.png')}}" width="120" height="120" alt="{{config('app.name')}}">
        </div>
        <h2 class="card-title text-center mb-4">{{ __('Create new account') }}</h2>
        <div class="mb-3">
            <label class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Password') }}</label>
            <div class="input-group input-group-flat">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Confirm Password') }}</label>
            <div class="input-group input-group-flat">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{ __('Create new account') }}</button>
        </div>
    </div>
</form>
@if (Route::has('login'))
<div class="text-center text-muted mt-3">
    Already a member? <a href="{{route('login')}}" tabindex="-1">{{ __('Sign in')}}</a>
</div>
@endif
@endsection

@section('scripts')
<script>
    $(function() {
        $('.link-secondary').on('click', function(e) {
            e.preventDefault();
            var x = document.getElementById("password");
            var y = document.getElementById("password-confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        });
    });
</script>
@endsection
