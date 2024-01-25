@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="main-content pt-2 pt-lg-4 px-lg-4">
    <div class="top-bar">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <button class="btn-nav d-lg-none d-md-inline-block" id="toggleButtonOpen">
                    <i class="bi bi-list"></i>
                </button>
                <p class="mb-0 heading-text">Change Password</p>
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none d-lg-block">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="https://via.placeholder.com/350" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="d-flex" style="height: 100%;">
        <div class="col-sm-6 mt-5">
            <div class="p-4">
                <form method="POST" action="{{route('express.change.password')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="OldPassword">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="OldPassword" aria-describedby="oldPassword">
                        @error('old_password')
                        <small id="oldPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="NewPassword">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="NewPassword" aria-describedby="newPassword">
                        @error('new_password')
                        <small id="newPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="ConfirmNewPassword">Confirm New Password</label>
                        <input type="password" name="confirm_new_password" class="form-control" id="ConfirmNewPassword" aria-describedby="ConfirmnewPassword">
                        @error('confirm_new_password')
                        <small id="ConfirmnewPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Change Password</button>
                    <!-- <div class="d-flex justify-content-between align-items-center mt-5">
                        <div class="form-group ">
                            <a href="{{route('express.dashboard')}}">Go Back</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush