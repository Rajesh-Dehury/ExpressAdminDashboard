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
                    <h1 class="text-white text-center mt-3 mb-3 px-0 px-md-5">Forgot your password?</h1>
                    <p class="text-center text-white px-0 px-md-5">Enter the email address that you signed up for LifeVitae with and we’ll send you instructions.</p>
                    <form id="login" method="POST" class="login__form px-0 px-md-5" action="{{route('express.forgot.password')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" maxlength="255" autocomplete="off" type="email" value="" class="form-control">
                            @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="mt-5 btn btn-green">
                            <span>SEND EMAIL</span>
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