<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    <title>Wi-hire</title>

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/signup.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .field-icon {
            float: right;
            margin-right: 10px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/img/wihireicon copy.png" alt="..." height="30">
                <b>WiHire</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('howto2') }}">How to Use</a>
                    </li>
                    <li>
                        <a class="btn btn-outline-light rounded" type="button"
                            href="{{ route('c_login') }}"><b>EMPLOYER LOGIN</b></a>
                    </li>
                </ul>
            </div>
    </nav>
    <!-- Navbar -->

    <!-- reg form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('u_check') }}" method="post">
                @csrf

                <h3 class="fw-bold">Job Seeker Login</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6 text-start">
                        Don't have an Account?
                        <a style="color:rgb(238, 54, 54);" href="{{ route('u_signup') }}">CREATE
                            NOW!</a>
                    </div>
                    <div class="col-sm-6 text-end">
                        Employer?
                        <a style="color:rgb(238, 54, 54);" href="{{ route('c_login') }}">LOGIN AS EMPLOYER
                            HERE!</a>
                    </div>
                </div>
                <hr>
                @if (Session::get('fail'))
                    <div style="background-color: #fa695f; /* Red */color: white;font-weight:bold;text-align:center;">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @if (Session::get('success'))
                    <div style="background-color: #3cf84c; /* Red */color: white;font-weight:bold;text-align:center;">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <br>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com">
                    <label for="floatingInput"><i class="bi text-danger bi-envelope-fill"></i> Email address</label>
                    <span style="color: #fa695f;" class="text">@error('email'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="inputPasswordNew" name="password"
                        placeholder="Password"/>
                    <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                        id="togglePassword"></span>
                    <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i> Password </label>
                    <span style="color: #fa695f;"
                        class="text">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <br>
                    <a type="button" class="text-black" href="{{ route('u_forgot') }}">Forgot Password?</a>
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

        <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
            var s = document.createElement('script')
            s.src = "/js/viewpass.js";
            document.head.appendChild(s);
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

    </html>
