@extends('layouts.howtoMaster')

@section('title', 'How to')


@section('customCSS')
    @parent

@endsection


@section('body')
    @parent
@section('ls', 'bg-secondary')
<br>
<div id="main">
    <div class="head-nav">
        <h1>How to Use Wihire job-Portal</h1>
        <ul id="menu text-dark">
            <li class="nav-item">
                <a type="button" class="fw-bold text-dark align-middle px-2">
                    <i class="bi bi-question text-danger"></i> <span aria-current="page">
                        Login / Signup</span>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#1">
                            <i class="bi bi-question text-danger"></i>
                            Job Seeker Login
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#2">
                            <i class="bi bi-question text-danger"></i>
                            Job Seeker Signing up /Registering
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#3">
                            <i class="bi bi-question text-danger"></i>
                            Company / Employer Login
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#4">
                            <i class="bi bi-question text-danger"></i>
                            Company / Employer Signing up /Registering
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#5">
                            <i class="bi bi-question text-danger"></i>
                            Verifying Email
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#6">
                            <i class="bi bi-question text-danger"></i>
                            Forgot password
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>


    <div class="howCon">
        <div class="details">
            <h1 id="1"><b>Job Seeker Login</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                When Logging in, Just click the login button at the top right part section of the page.
                In after redirecting to Login page you will be ask for your email address and password for your
                account. If you don't have an account yet, you can register at our registration page, Just click register now
                ang ou will be redirected to our register page.
            </p>
            <img src="/howto/jslogin.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="2"><b>Job Seeker Signing up /Registering</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In registering, you will need to provide the infortamion that the page is requesting just like below.
                You must input a valid email and active one. After filling up the form, you will be redirected to the email
                verifying page to input the code that is sent to your email.
            </p>
            <img src="/howto/jsregis.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="3"><b> Company / Employer Login</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In registering, you will need to provide the infortamion that the page is requesting just like below.
                You must input a valid email and active one. After filling up the form, you will be redirected to the email
                verifying page to input the code that is sent to your email.
            </p>
            <img src="/howto/comlogin.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="4"><b>Company / Employer Signing up /Registering</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In registering, you will need to provide the infortamion that the page is requesting just like below.
                You must input a valid email and active one. After filling up the form, you will be redirected to the email
                verifying page to input the code that is sent to your email.
            </p>
            <img src="/howto/comregis.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="4"><b>Company / Employer Signing up /Registering</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In registering, you will need to provide the infortamion that the page is requesting just like below.
                You must input a valid email and active one. After filling up the form, you will be redirected to the email
                verifying page to input the code that is sent to your email.
            </p>
            <img src="/howto/comregis.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="5"><b>Verifying Email</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In registering, you will need to provide the infortamion that the page is requesting just like below.
                You must input a valid email and active one. After filling up the form, you will be redirected to the email
                verifying page to input the code that is sent to your email.
            </p>
            <img src="/howto/c_verify.png" alt="">
        </div>
        <br>
        <br>
        <div class="details">
            <h1 id="6"><b>Forgot password</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In you forgot your password and want to change it, you could click the <a class="text-decoration-none text-danger">Forgot Password</a>
                link in the login page to be redirected to the forgot passwword page. After Inputing email, a verifying code will
                be sent to the emnail that you entered. After getting the code, simply input the code and input your you password.
            </p>
            <img src="/howto/forgot.png" alt="">
        </div>
    </div>
</div>

@endsection
@section('customJS')

@endsection
