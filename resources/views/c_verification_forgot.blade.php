<!doctype html>
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

    <!--  form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('c_resetcheck') }}" method="post">
                @csrf
                @if (Session::get('fail'))
                    <div style="background-color: #fa695f; /* Red */color: white;font-weight:bold;text-align:center;">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <input type="hidden" name="id"value="{{ $user_info['id'] }}">
                <input type="hidden" name="email"value="{{ $user_info['email'] }}">
                <h3 class="fw-bold">Forgot Password Company / Employer Verification</h3>
                hi! <b>{{ $user_info['fname'] }}</b> An verification code has been sent to <i><b>{{ $user_info['email'] }}</b></i>
                check you email in the email address you inputed and enter the verification code below

                <hr>Did not get code?<a style="color:rgb(238, 54, 54);" href="resendVCforget/{{$user_info['id'] }}">RESEND</a>

                <hr>
                <div class="form-wrapper">
                    <label for="">Verification code</label>
                    <input type="text" class="form-control" placeholder="Verification Code" name="code">
                    <span style="color: #fa695f;" class="text">@error('code'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-wrapper">
                    <label for="">New Password</label>
                    <input onkeyup="checkPasswordMatch();" id="inputPasswordNew" type="password" class="form-control" placeholder="New Password" name="npassword">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-wrapper">
                    <label for="">Confirm Password</label>
                    <input onkeyup="checkPasswordMatch();" id="inputPasswordNewVerify" type="password" class="form-control" placeholder="Confirm Password"
                        name="cpassword">
                    <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    <span id='message'></span>
                </div>
                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger fw-bold">Verify</button>
                </div>
            </form>
        </div>
    </div>
    <!--  form-->

    <!-- footer -->
    <footer class="text-center text-white fixed-bottom" style="background-color: #333">

        <!-- Copyright -->
        <div class="text-center p-3 bd-dark">

        </div>
        <!-- Copyright -->
    </footer>
    <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
        var s = document.createElement('script')
        s.src = "/js/u_changepw.js";
        document.head.appendChild(s);
    </script>
    <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
        var s = document.createElement('script')
        s.src = "/js/viewpass.js";
        document.head.appendChild(s);
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
     integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
 </script>
 <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa" src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>
