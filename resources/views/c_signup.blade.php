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
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/img/wihireicon copy.png" alt="..." height="30">
                <b>WiHire</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
            <form onSubmit="return checkPassword(this)" action="{{ route('c_save') }}" method="post">

                @if (Session::get('success'))

                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        <a style="color:rgb(238, 54, 54);" href="{{ route('c_login') }}">LOGIN</a>
                    </div>
                @endif

                @if (Session::get('fail'))

                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <h3>Registration Form</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="cname"
                    placeholder="FirstName" value="{{ old('cname') }}">
                    <label for="floatingInput"><i class="bi text-danger bi-person-lines-fill"></i> Company / Business Name</label>
                    <span style="color: #fa695f;" class="text">@error('cname'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="CPname"
                    placeholder="LastName" value="{{ old('CPname') }}">
                    <label for="floatingInput"><i class="bi text-danger bi-person-lines-fill"></i> Contact Person Name</label>
                    <span style="color: #fa695f;" class="text">@error('CPname'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com">
                    <label for="floatingInput"><i class="bi text-danger bi-envelope-fill"></i> Email address</label>
                    <span style="color: #fa695f;" class="text">@error('email'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating">
                    <input onkeyup="checkPasswordMatch();" type="password" class="form-control" id="password" name="password"
                        placeholder="Password" />
                    <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                        id="togglePassword"></span>
                    <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i> Password </label>
                    <span style="color: #fa695f;"
                        class="text">@error('password'){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="form-floating">
                    <input onkeyup="checkPasswordMatch();" type="password" class="form-control" id="cpassword" name="cpassword"
                        placeholder="Password" />
                    <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i>Confirm Password </label>
                    <span style="color: #fa695f;"
                        class="text">@error('cpassword'){{ $message }}@enderror</span>
                </div>
                <span id='message'></span>
                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                </div>
                <br>
                <button type="submit" class="btn btn-danger">Register Now</button>
                <hr>Already Registered?
                <a style="color:rgb(238, 54, 54);" href="{{ route('c_login') }}">LOGIN NOW!</a>
            </form>
        </div>
    </div>
    <!-- reg form-->

    <script>
        // Function to check Whether both passwords are equal
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#cpassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else if (password =='')
            $("#divCheckPasswordMatch").html("Enter Password!");
            else if (confirmPassword =='')
            $("#divCheckPasswordMatch").html("Enter Password!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }

        $(document).ready(function() {
            $("#password, #cpassword").keyup(checkPasswordMatch);
        });
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        }
        );
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
