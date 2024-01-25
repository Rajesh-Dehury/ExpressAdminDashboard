@extends('layouts.guest')

@section('title', 'Login')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endpush

@section('content')
<div class="container-fluid details-section pt-2 pt-md-5">
    <div class="row justify-content-center align-items-center pt-2 pt-md-5">
        <div class="col-sm-6">
            <div class="row text-center">
                <div class="col-12 align-self-baseline">
                    <img class="login-logo" src="https://lifevitae.co/assets/img/login-logo.svg">
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-self-baseline">
                    <div style="margin: 20px 0;">
                    </div>
                    <h1 class="text-white text-center mt-3 mb-3">Log in to your LifeVitae account</h1>
                    <form id="login" method="POST" class="login__form px-0 px-md-5" action="{{route('express.login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" maxlength="255" autocomplete="off" type="email" value="" class="form-control">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group" style="position: relative;">
                            <label for="password">Password</label>
                            <input type="password" name="password" autocomplete="off" id="password" class="form-control">
                            <button type="button" class="app-input__show-password" id="show_password"></button>
                            @error('password')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group form-check d-flex align-items-center">
                            <input type="checkbox" name="remember" class="form-check-input mb-1" id="exampleCheck1">
                            <label class="form-check-label mb-0" for="exampleCheck1">Remember Me</label>
                        </div>
                        <button type="submit" class="mt-3 btn btn-green">
                            <span>Log In</span>
                        </button>
                    </form>
                    <div class="login__links mt-3 text-center">
                        <a href="{{route('express.forgot.password')}}" class="">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush