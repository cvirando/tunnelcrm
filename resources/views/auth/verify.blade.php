@extends('layouts.auth')
@section('title', 'Verify Your Email Address')
@section('content')
<form class="card card-md" method="POST" action="{{ route('verification.resend', app()->getLocale()) }}">
    @csrf
    <div class="card-body">
        <div class="text-center">
            <img  data-bs-toggle="tooltip" data-bs-placement="right" title="Tunnel CRM" src="{{ asset('template/static/tunnelcrm.png')}}" width="120" height="120" alt="{{config('app.name')}}">
        </div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <h2 class="card-title text-center mb-4">{{ __('Verify Your Email Address') }}</h2>
        <p class="text-muted mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},</p>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
            <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
            {{ __('click here to request another') }}
            </button>
        </div>
    </div>
</form>
@endsection
