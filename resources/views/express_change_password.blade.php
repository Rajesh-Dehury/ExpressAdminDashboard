@extends('layouts.guest')

@section('title', 'Change Password')

@section('content')
<div style="height: 100vh;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
        <div class="col-sm-4">
            <div class="card p-4 shadow">
                <h3 class="mb-3 text-center">Change Password</h3>
                <form method="POST" action="{{route('express.change.password')}}">
                    @csrf
                    <div class="form-group">
                        <label for="OldPassword">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="OldPassword" aria-describedby="oldPassword">
                        @error('old_password')
                        <small id="oldPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NewPassword">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="NewPassword" aria-describedby="newPassword">
                        @error('new_password')
                        <small id="newPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ConfirmNewPassword">Confirm New Password</label>
                        <input type="password" name="confirm_new_password" class="form-control" id="ConfirmNewPassword" aria-describedby="ConfirmnewPassword">
                        @error('confirm_new_password')
                        <small id="ConfirmnewPassword" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-group ">
                            <a href="{{route('express.dashboard')}}">Go Back</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush