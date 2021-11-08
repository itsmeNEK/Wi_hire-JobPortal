<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wi-hire</title>
    <link rel="stylesheet" type="text/css" href="/css/loginsign.css">
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


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
                </ul>
            </div>
    </nav>
    <!-- Navbar -->

    <!-- reg form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('c_codecheck') }}" method="post">
                @csrf
                @if (Session::get('fail'))
                    <div style="background-color: #fa695f; /* Red */color: white;">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <input type="hidden" name="email"value="{{ $user_info['email'] }}">
                <h3 class="fw-bold">Company / Employer Verification</h3>
                hi! <b>{{ $user_info['fname'] }}</b> An verification code has been sent to <i><b>{{ $user_info['email'] }}</b></i>
                check you email in the email address you inputed and enter the verification code below
                <hr>
                <div class="form-wrapper">
                    <label for="">Verification code</label>
                    <input type="text" class="form-control" placeholder="Verification Code" name="code">
                    <span style="color: #fa695f;" class="text">@error('code'){{ $message }}
                        @enderror</span>
                </div>
                <hr>Did not get code?
                <a style="color:rgb(238, 54, 54);" href="resendVC/{{$user_info['id'] }}">RESEND</a>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger fw-bold">Verify</button>
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
