<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-custom">

    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('assets/imgs/logo.png')}}" width="30" height="30" alt="">  Qualityresearch101.com
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav  ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url("/") }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('about') }}">About Us</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>

<div class="register">
    <div class="row">
        <div class="col-md-4 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Steps to Work With Us</h3>
            <ul>
                <li>Sign up Account with your personal details.</li>
                <li>Wait account activation (24hrs Max).</li>
                <li>Start taking orders.</li>
                <li>Get Paid.</li>
            </ul>
            <br>
            <h3>Expectations from you</h3>
            <ul>
                <li>Quality plagiarism free writing.</li>
                <li>Ability to meet the requirements.</li>
                <li>Timely orders submission.</li>
                <li>Compliance with the Company's Policy.</li>
            </ul>
            <br>
            <h3>Why Us?</h3>
            <ul>
                <li>Constant Work flow.</li>
                <li>Regular & Timely payments.</li>
                <li>Trustworthy.</li>
                <li> Live Support 24/7.</li>
            </ul>
        </div>
        <div class="col-md-8 register-right">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                </li>
            </ul>
            <div class="tab-content" style="padding-top: 20px">
                <div class=" tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                   <div class="container-fluid">
                    <h3 class="register-heading">Login to your account</h3>
                    <div class="row justify-content-center register-image-holder" >
                        <img src="{{asset('assets/imgs/freelancer.png')}}" class="register-image" alt=""/>
                    </div>
                    <div class="row register-form justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" value="" />
                            </div>

                            <input type="submit" class="btnRegister"  value="Login"/>

                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade show" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <h3  class="register-heading">Create an account</h3>

                    <div class="row justify-content-center register-image-holder" >
                        <img src="{{asset('assets/imgs/freelancer.png')}}" class="register-image" alt=""/>
                    </div>
                    <div class="row register-form justify-content-center">
                        <div class=" col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" value="" />
                            </div>

                            <input type="submit" class="btnRegister"  value="Register"/>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
