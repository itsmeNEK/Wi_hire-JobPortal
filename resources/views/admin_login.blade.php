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

    <!-- reg form-->
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('a_check') }}" method="post">
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
                <h3 class="fw-bold">Admin</h3>
                <hr>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="uname"
                        placeholder="Username">
                    <label for="floatingInput"><i class="bi text-danger bi-person-fill"></i> Username</label>
                    <span style="color: #fa695f;" class="text">@error('uname'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="inputPasswordNew" name="password"
                        placeholder="Password" />
                    <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                        id="togglePassword"></span>
                    <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i> Password </label>
                    <span style="color: #fa695f;"
                        class="text">@error('password'){{ $message }}@enderror</span>
                    </div>
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

    </body>

    </html>
