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
                        <a class="btn btn-outline-light rounded" type="button" href="{{ route('u_login') }}"><b>jOB
                                SEEKER LOGIN</b></a>
                    </li>

                </ul>
            </div>
    </nav>
    <!-- Navbar -->

    <!-- reg form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('c_check') }}" method="post">
                @csrf
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
                <h3 class="fw-bold">Company/Employer Login</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6 text-start">
                        Don't have an Account?
                        <a style="color:rgb(238, 54, 54);" href="{{ route('c_signup') }}">CREATE
                            NOW!</a>
                    </div>
                    <div class="col-sm-6 text-end">
                        JOB SEEKER?
                        <a style="color:rgb(238, 54, 54);" href="{{ route('u_login') }}">LOGIN AS JOB SEEKER
                            HERE!</a>
                    </div>
                </div>
                <hr>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com">
                    <label for="floatingInput"><i class="bi text-danger bi-envelope-fill"></i> Email address</label>
                    <span style="color: #fa695f;" class="text">@error('email'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password" />
                    <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                        id="togglePassword"></span>
                    <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i> Password </label>
                    <span style="color: #fa695f;"
                        class="text">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <br>
                    <a type="button" class="text-black" href="{{ route('c_forgot') }}">Forgot Password?</a>
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

        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#floatingPassword');
            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye / eye slash icon
                this.classList.toggle('bi-eye');
            });
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    </body>

    </html>
