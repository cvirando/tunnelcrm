@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
<form class="card card-md" method="POST" action="{{ route('password.email', app()->getLocale()) }}">
    @csrf
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h2 class="card-title text-center mb-4">{{ __('Reset Password') }}</h2>
        <p class="text-muted mb-4">Enter your email address and your password reset link will be emailed to you.</p>
        <div class="mb-3">
            <label class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
            {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
@if (Route::has('login', app()->getLocale()))
<div class="text-center text-muted mt-3">
    Forget it, <a href="{{route('login', app()->getLocale())}}">send me back</a> to the sign in screen.
</div>
@endif
@endsection
