@extends('layouts.auth')

@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success bg-gradient rounded-3 text-white text-center fs-3 fw-bolder">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-top-0 border-end-0 border-start-0 bg-light"
                                    name="name" placeholder="Insert your fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="telepon" class="col-md-4 col-form-label text-md-right">{{__('Phone')}}</label>

                            <div class="col-md-6">
                                <input id="telepon" type="tel"
                                    class="form-control @error('telepon') is-invalid @enderror border-top-0 border-end-0 border-start-0 bg-light" name="telepon"
                                    placeholder="+62 800 0000 0000" value="{{ old('telepon') }}" required autocomplete="telepon">

                                @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-end-0 border-start-0 bg-light"
                                    name="email" placeholder="Eg. example@mail.com" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror border-top-0 border-end-0 border-start-0 bg-light" name="password"
                                    placeholder="Insert password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control border-top-0 border-end-0 border-start-0 bg-light"
                                    name="password_confirmation" placeholder="Re-insert password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mb-4">
                            <div class="col-md-6 offset-md-4 d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection