<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Change Password</title>
</head>

<body>
    <div style="height: 100vh;">
        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
            <div class="col-sm-4">
                <div class="card p-4 shadow">
                    <h1 class="mb-3 text-center">Change Password</h1>
                    <form method="POST" action="{{route('express.forgot.reset')}}">
                        @csrf
                        <input type="hidden" name="forgot_password" value="{{$forgot_password}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword">
                            @error('password')
                            <small id="" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confermation">Confirm Password</label>
                            <input type="password" name="password_confermation" class="form-control" id="password_confermation">
                            @error('password')
                            <small id="" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>