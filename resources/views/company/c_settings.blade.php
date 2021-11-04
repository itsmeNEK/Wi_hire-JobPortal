@extends('layouts.companyMaster')

@section('title', 'Settings')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('settings', 'bg-danger')

<div id="main">
    <div class="col py-3">
        <div class="container">
            <div class="row" style="margin-top:45px;">
                <div class="com-md-4 col-md-offset-4">

                    <div class="container rounded bg-white ">
                        <br>
                        <!-- form card change password -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h4 class="mb-0">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('c_cp') }}" method="POST" class="form" role="form"
                                    autocomplete="off">

                                    <input name="id" type="hidden" value="{{ $LoggedUserInfo['id'] }}">
                                    @if (Session::get('success'))

                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if (Session::get('fail'))

                                        <div class="alert alert-danger">
                                            {{ Session::get('fail') }}
                                        </div>
                                    @endif

                                    @csrf
                                    <div class="form-group">
                                        <label for="inputPasswordOld " class="font-weight-bold">Current
                                            Password</label>
                                        <input type="password" name="currentpass" class="form-control"
                                            id="inputPasswordOld" required="">
                                        <span style="color: #fa695f;"
                                            class="text">@error('currentpass'){{ $message }}
                                            @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew" class="font-weight-bold">New Password</label>
                                        <input onkeyup="checkPasswordMatch();" type="password" name="newpass"
                                            class="form-control" id="inputPasswordNew" required="">
                                        <span style="color: #fa695f;"
                                            class="text">@error('newpass'){{ $message }}
                                            @enderror</span>
                                        <span class="form-text small text-muted">
                                            The password must be 6-20 characters.
                                        </span>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNewVerify" class="font-weight-bold">Confirm
                                            Password</label>
                                        <input onkeyup="checkPasswordMatch();" type="password" name="cpass"
                                            class="form-control" id="inputPasswordNewVerify" required="">
                                        <span id="check-match" style="color: #fa695f;"
                                            class="text">@error('cpass'){{ $message }}
                                            @enderror</span>
                                        <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                    </div>
                                    <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-lg float-right">Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /form card change password -->
                        <br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to check Whether both passwords are equal
    function checkPasswordMatch() {
        var password = $("#inputPasswordNew").val();
        var confirmPassword = $("#inputPasswordNewVerify").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("Passwords do not match!");
        else if (password == '')
            $("#divCheckPasswordMatch").html("Enter Password!");
        else if (confirmPassword == '')
            $("#divCheckPasswordMatch").html("Enter Password!");
        else
            $("#divCheckPasswordMatch").html("Passwords match.");
    }

    $(document).ready(function() {
        $("#inputPasswordNew, #inputPasswordNewVerify").keyup(checkPasswordMatch);
    });
</script>

@endsection

@section('customJS')
@parent
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/u_cpass.js"></script>
@endsection
