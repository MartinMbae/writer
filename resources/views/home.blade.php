@extends('layouts.home_layout')
@section('content')
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
                        <a class="nav-link  {!! $errors->hasBag('register') ? '' : 'active' !!}" id="login-tab" data-toggle="tab" href="#login" role="tab"
                           aria-controls="home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {!! $errors->hasBag('register') ? ' active' : '' !!}" id="register-tab" data-toggle="tab" href="#register" role="tab"
                           aria-controls="profile" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content" style="padding-top: 20px">
                    <div class=" tab-pane fade show  {!! $errors->hasBag('register') ? '' : 'active' !!}" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="container-fluid">
                            <h3 class="register-heading">Login to your account</h3>
                           @include('components.login_register_image')
                            @include('components.login')
                        </div>
                    </div>
                    <div class="tab-pane fade show {!! $errors->hasBag('register') ? 'active' : '' !!}" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <h3 class="register-heading">Create an account</h3>
                        @include('components.login_register_image')
                        @include("components.register_form")
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
