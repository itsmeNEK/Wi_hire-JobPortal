@extends('layouts.adminMaster')

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
                                <form action="{{ route('a_cp') }}" method="POST">

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
                                        <label for="inputPasswordOld " class="fw-bold">Current
                                            Password</label>
                                        <input type="password" name="currentpass" class="form-control"
                                            id="inputPasswordOld" required="">
                                        <span style="color: #fa695f;"
                                            class="text">@error('currentpass'){{ $message }}
                                            @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew" class="fw-bold">New Password</label>
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
                                        <label for="inputPasswordNewVerify" class="fw-bold">Confirm
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
@endsection

@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/u_changepw.js";
    document.head.appendChild(s);
</script>
@endsection

