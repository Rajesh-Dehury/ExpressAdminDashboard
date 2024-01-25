<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-md-5 nav-bg nav-bg-gradient">
        <a class="navbar-brand" href="#">
            <img src="https://lifevitae.co/assets/img/logo.svg" width="130" alt="">
        </a>

        <div class="d-flex align-items-center">
            <div class="dropdown mr-3 d-md-none">
                <div class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://lifevitae.co/storage/language/1553835162898283949.png" alt="" height="25" width="25">
                </div>
                <div class="dropdown-menu pull-rightt">
                    <a href="" class="dropdown-item a-none text-black-50">
                        <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1553835183703211339.png" />
                        <span id="js_language">Bahasa (Indonesia)</span>
                    </a>
                    <a href="" class="dropdown-item a-none text-black-50">
                        <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1553835162898283949.png" />
                        <span id="js_language">English</span>
                    </a>
                    <a href="" class="dropdown-item a-none text-black-50">
                        <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1564430903717801357.png" />
                        <span id="js_language">Hindi (हिंदी)</span>
                    </a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold mr-3" href="#">LOG IN</a>
                </li>
                <li class="nav-item dropdown d-none d-md-block">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="https://lifevitae.co/storage/language/1553835162898283949.png" alt="" height="25" width="25">
                    </a>
                    <ul class="dropdown-menu pull-rightt">
                        <li class="dropdown-item mb-1">
                            <a href="" class="a-none text-black-50">
                                <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1553835183703211339.png" />
                                <span id="js_language">Bahasa (Indonesia)</span>
                            </a>
                        </li>
                        <li class="dropdown-item mb-1">
                            <a href="" class="a-none text-black-50">
                                <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1553835162898283949.png" />
                                <span id="js_language">English</span>
                            </a>
                        </li>
                        <li class="dropdown-item mb-1">
                            <a href="" class="a-none text-black-50">
                                <img class="mr-1" height="30" width="30" src="https://lifevitae.co/storage/language/1564430903717801357.png" />
                                <span id="js_language">Hindi (हिंदी)</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

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

    <div class="footer">
        <div class="container">
            <div class="row justify-content-center" id="footer_main_img">
                <div class="col-lg-8 text-center">
                    <img src="https://lifevitae.co/assets/img/footer.png" class="img-fluid mb-5">
                </div>
            </div>
            <div class="row justify-content-center" id="footer_instagram">
                <div class="col-lg-4 mb-3  text-center">
                    <span class="follow-btn">
                        <a href="https://www.facebook.com/lifevitae.co/" target="_blank" class="btn btn-info">
                            <i class="fa fa-facebook"></i>
                            &nbsp;&nbsp;LifeVitae</a>
                    </span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 text-center">
                    <h2 class="mt-0">
                        Join our fast growing network of students, teachers, principals, counsellors, coaches and many
                        others and find out your strength profile today.
                    </h2>
                    <p class="mb-3 mt-4">Get started by creating your LifeVitae profile today</p>
                </div>
            </div>

            <div class="row justify-content-center pb-5">
                <div class="col-12 col-sm-9">
                    <ul class="footer-link-new">
                        <li>
                            <a href="https://lifevitae.co/aboutus" target="_blank">About Us</a>
                        </li>
                        <li>
                            <a href="https://lifevitae.co/terms-condition" target="_blank">Terms</a>
                        </li>
                        <li>
                            <a href="https://lifevitae.co/privacy-policy" target="_blank">Privacy</a>
                        </li>
                        <li>
                            <a href="https://lifevitae.co/faqs" target="_blank" style="text-transform: none;">FAQs</a>
                        </li>
                        <li>
                            <a href="https://lifevitae.co/contactus" target="_blank">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://lifevitae.co/blog/" target="_blank">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>