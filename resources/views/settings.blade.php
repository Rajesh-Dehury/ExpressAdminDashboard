@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="main-content pt-2 pt-lg-4 px-lg-4">
    <div class="top-bar">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <button class="btn-nav d-lg-none d-md-inline-block" id="toggleButtonOpen">
                    <i class="bi bi-list"></i>
                </button>
                <p class="mb-0 heading-text">Settings</p>
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="{{$express_client_admin->logo ?? 'https://ui-avatars.com/api/?name=' . $express_client_admin->name}}" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="d-flex" style="height: 100%;">
        <div class="col-sm-12 mt-5">
            <h5 class="ps-4 account_setting_text">Account Setting</h5>
            <span class="underline_account"></span>
            <div class="p-4">
                <form method="POST" action="{{route('express.update.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="Your_Logo" class="mb-3">Your Logo (Recommended aspect ratio 1:1)</label>
                                <div class="d-flex">
                                    <div class="logo_outline" onclick="triggerFileInput()" role="button">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{asset('assets/images/gallery-add.svg')}}" class="gallery-add mx-auto" alt="">
                                        </div>
                                        <p class="text-center mt-3">Upload your logo</p>
                                    </div>
                                    <div class="ms-3">
                                        <img src="{{$express_client_admin->logo ?? 'https://ui-avatars.com/api/?name=' . $express_client_admin->name}}" alt="" style="width: 100px;">
                                    </div>
                                </div>
                                <input type="file" name="logo" class="form-control d-none" id="Your_Logo" placeholder="">
                                @error('logo')
                                <small id="Your_Logo" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row mb-5">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="Username" class="mb-3">Username</label>
                                <input type="text" name="organisation_name" value="{{$express_client_admin->organisation_name}}" class="form-control custom-input" id="Username" aria-describedby="Username" placeholder="Please enter your organisation name">
                                @error('organisation_name')
                                <small id="Username" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h5>Change Password</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="OldPassword" class="mb-3">Old Password</label>
                                <input type="password" name="old_password" class="form-control custom-input" id="OldPassword" aria-describedby="oldPassword">
                                @error('old_password')
                                <small id="oldPassword" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="NewPassword" class="mb-3">New Password</label>
                                <input type="password" name="new_password" class="form-control custom-input" id="NewPassword" aria-describedby="newPassword">
                                @error('new_password')
                                <small id="newPassword" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="ConfirmNewPassword" class="mb-3">Confirm New Password</label>
                                <input type="password" name="confirm_new_password" class="form-control custom-input" id="ConfirmNewPassword" aria-describedby="ConfirmnewPassword">
                                @error('confirm_new_password')
                                <small id="ConfirmnewPassword" class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <button type="submit" class="btn btn-purple btn-block mt-3">Update</button>
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
<script>
    function triggerFileInput() {
        document.getElementById('Your_Logo').click();
    }
</script>
@endpush