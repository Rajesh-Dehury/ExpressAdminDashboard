@extends('layouts.guest')

@section('title', 'Forgot Password')

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endpush

@section('content')
<div class="container-fluid details-section pt-2 pt-md-5">
    <div class="row justify-content-center align-items-center pt-2 pt-md-5">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-12 align-self-baseline">
                    <div style="margin: 20px 0;">
                    </div>
                    <h1 class="text-white text-center mt-3 mb-3 px-0 px-md-5">Change Password</h1>
                    <form id="login" method="POST" class="login__form px-0 px-md-5" action="{{route('express.forgot.reset')}}">
                        @csrf
                        <input type="hidden" name="forgot_password" value="{{$forgot_password}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input name="password" maxlength="255" autocomplete="off" type="password" value="" class="form-control" id="InputPassword">
                            @error('password')
                            <small id="" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confermation">Confirm Password</label>
                            <input type="password" maxlength="255" autocomplete="off" name="password_confermation" class="form-control" id="password_confermation">
                            @error('password')
                            <small id="" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="mt-5 btn btn-green">
                            <span>Change Password</span>
                        </button>
                    </form>
                    <div class="login__links mt-3 text-center">
                        <a href="{{route('express.login')}}" class="">BACK TO LOG IN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush
