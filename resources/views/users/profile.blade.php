@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        User
        </div>
        <h2 class="page-title">
        Profile
        </h2>
    </div>
@endsection

@section('pagelinks')
@endsection

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card card-md">
                <div class="card-body">
                    <h3 class="h1">{{$user->name}}'s Profile</h3>
                    <form action="{{route('updateProfile', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <div class="input-group input-group-flat">
                                    <input type="password" name="password" id="password" class="form-control">

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
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                <div class="input-group input-group-flat">
                                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
                                    <span class="input-group-text">
                                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                            <svg xmlns="https://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 mt-3 text-end">
                                <button type="submit" class="btn btn-md btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
