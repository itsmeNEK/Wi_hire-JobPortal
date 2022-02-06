@extends('layouts.companyMaster')

@section('title', 'Settings')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
    <style>
        .field-icon {
            float: right;
            margin-right: 10px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }

    </style>
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

                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="inputPasswordNewC"
                                            name="currentpass" placeholder="Current Password" />
                                        <span for="floatingPassword"
                                            class=" field-icon bi text-danger bi-eye-slash-fill"
                                            id="togglePasswordc"></span>
                                        <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i>
                                            Current Password </label>
                                        <span style="color: #fa695f;"
                                            class="text">@error('currentpass'){{ $message }}@enderror</span>
                                        </div>
                                        <br>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="inputPasswordNew"
                                                name="newpass" placeholder="New Password" />
                                            <span for="floatingPassword"
                                                class=" field-icon bi text-danger bi-eye-slash-fill"
                                                id="togglePassword"></span>
                                            <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i>
                                                New Password </label>
                                            <span class="form-text small text-muted">
                                                The password must be 6-20 characters.
                                            </span>
                                            <span style="color: #fa695f;"
                                                class="text">@error('newpass'){{ $message }}@enderror</span>
                                            </div>
                                            <br>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="inputPasswordNewVerify"
                                                    name="cpass" placeholder="Confirm Password" />
                                                <span for="floatingPassword"
                                                    class=" field-icon bi text-danger bi-eye-slash-fill"
                                                    id="toggleCPassword"></span>
                                                <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i>Confirm
                                                    Password </label>
                                                <span class="form-text small text-muted">
                                                    To confirm, type the new password again.
                                                </span>
                                                <span style="color: #fa695f;"
                                                    class="text">@error('cpass'){{ $message }}@enderror</span>
                                                </div>
                                                <br>
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
        @endsection

        @section('customJS')
            @parent
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
        @endsection
