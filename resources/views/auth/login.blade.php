
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wi-hire</title>

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/signup.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><b>WiHire</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">How to Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('u_login') }}">Login <b>(Job
                                Seeker)</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Login<b> (Employer)</b></a>
                    </li>

                </ul>
            </div>
    </nav>
    <!-- Navbar -->

    <!-- reg form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('login') }}" method="post">
                @csrf
                @if (Session::get('fail'))
                    <div style="background-color: #fa695f; /* Red */color: white;">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <h3 class="fw-bold">Job Seeker Login</h3>
                <br>Don't have an Account?
                <a style="color:rgb(238, 54, 54);text-decoration: none;" href="{{ route('u_signup') }}">CREATE
                    NOW!</a>
                <hr>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}">
                    <span style="color: #fa695f;" class="text">@error('email'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span style="color: #fa695f;" class="text">@error('password'){{ $message }}
                        @enderror</span>
                </div>
                <a style="color:rgb(0, 0, 0); text-decoration: none;" href="#">Forgot Password?</a>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger fw-bold">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- reg form-->

    <!-- footer -->
    <footer class="text-center text-white fixed-bottom" style="background-color: #333">

        <!-- Copyright -->
        <div class="text-center p-3 bd-dark">

        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
