<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Wi-Hire</title>
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
</head>

<body style="background-color: rgb(223, 221, 221)">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-toggler border-0 btn-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/img/wihireicon copy.png" alt="..." height="30">
                <b>WiHire</b></a>
            <div class="d-flex flex-row bd-highlight">
                <a class="navbar-toggler p-2 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi text-white bi-three-dots-vertical"></i>
                </a>
                <div class="btn-group dropstart">
                    <a type="button" class="bell-nonfull border-0 btn-lg bg-none" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-target="#notif" aria-controls="notif">
                        <i class="bi bi-bell-fill text-light"></i>
                        @if ($active != null)
                    <span class="position-absolute top-10 start-90 translate-middle p-2">
                        <i class="iActive bi text-danger bi-circle-fill"></i>
                    </span>
                @endif
                    </a>
                    <ul class="dropdown-menu bg-light" id="notif">
                        <b class="ml-1">Notifications</b>
                        <div class="list-group">
                            @if ($active != null)
                                <div class="list-group-item list-group-item-action bg-light border-0">
                                    <span class="text-secondary font-weight-bold">Mailbox</span>
                                    @forelse ( $inbox as $info)
                                        <a aria-current="true" href="view_mail/{{ Crypt::encrypt($info->id) }}"
                                            class="nav-link text-dark bg-light">

                                            <div class="p-1 py-1">
                                                <b>@if ($info->cname != null)
                                                    {{ $info->cname }}
                                                @else
                                                    Admin
                                                @endif</b> <br>
                                                <div class="d-flex w-100 justify-content-between">
                                                    {{ $info->subject }}
                                                </div>
                                                <div style="font-size: 12px" class="col-sm-12 text-right">
                                                    <small
                                                        class="text-secondary">{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                    @endforelse
                                </div>

                            @endif
                        </div>
                    </ul>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('jobs') }}">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('companies') }}">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('howto2') }}">How to Use</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="btn-group dropstart">
            <a type="button" class="bell-full border-0 btn-lg bg-none" data-bs-toggle="dropdown" aria-expanded="false"
                data-bs-target="#notif" aria-controls="notif">
                <i class="bi bi-bell-fill text-light"></i>
                @if ($active != null)
                    <span class="position-absolute top-10 start-90 translate-middle p-2">
                        <i class="iActive bi text-danger bi-circle-fill"></i>
                    </span>
                @endif
            </a>
            <ul class="dropdown-menu bg-light" id="notif">
                <b class="ml-1">Notifications</b>
                <div class="list-group">
                    @if ($active != null)
                        <div class="list-group-item list-group-item-action bg-light border-0">
                            <span class="text-secondary font-weight-bold">Mailbox</span>
                            @forelse ( $inbox as $info)
                                <a aria-current="true" href="view_mail/{{ Crypt::encrypt($info->id) }}"
                                    class="nav-link text-dark bg-light">

                                    <div class="p-1 py-1">
                                        <b>@if ($info->cname != null)
                                            {{ $info->cname }}
                                        @else
                                            Admin
                                        @endif</b> <br>
                                        <div class="d-flex w-100 justify-content-between">
                                            {{ $info->subject }}
                                        </div>
                                        <div style="font-size: 12px" class="col-sm-12 text-right">
                                            <small
                                                class="text-secondary">{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </a>
                            @empty
                            @endforelse
                        </div>

                    @endif
                </div>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->
    <br>
    <br>

    @csrf
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-body bg-dark">
            <span class="d-flex align-items-center text-light text-decoration-none" aria-expanded="false">
                <img class="avatar rounded-circle border border-light " width="40px"
                    src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['fname'] }}
                        {{ $LoggedUserInfo['lname'] }}</b></strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('u_dash') }}"
                        class="font-weight-bold nav-link text-light align-middle px-2 bg-danger">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_mail_inbox') }}"
                        class="font-weight-bold nav-link text-light align-middle px-2">
                        <div class="row">
                            <div class="col-8 text-left">
                                <i class="bi bi-mailbox"></i> <span aria-current="page">
                                    Mailbox
                                </span>
                            </div>
                            @if ($active != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $active }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_sett') }}" class="font-weight-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_logout') }}" class="font-weight-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                            Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="bg-light">
        </div>
    </div>
    <div id="mySidebar" class="sidebar bg-dark">
        <button type="button" style="background-color:transparent; color:white; border:none;" href="javascript:void(0)"
            class="closebtn" onclick="closeNav()">&times;</button>
        <div>
            <hr class="bg-light">
            <span class="d-flex align-items-center text-light text-decoration-none" aria-expanded="false">
                <img class="avatar rounded-circle border border-light " width="40px"
                    src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['fname'] }}
                        {{ $LoggedUserInfo['lname'] }}</b></strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('u_dash') }}"
                        class="font-weight-bold nav-link text-light align-middle px-2 bg-danger">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_mail_inbox') }}"
                        class="font-weight-bold nav-link text-light align-middle px-2">
                        <div class="row">
                            <div class="col-8 text-left">
                                <i class="bi bi-mailbox"></i> <span aria-current="page">
                                    Mailbox
                                </span>
                            </div>
                            @if ($active != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $active }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_sett') }}" class="font-weight-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_logout') }}" class="font-weight-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                            Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="bg-light">
        </div>
    </div>

    <div id="main">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif
        <div class="col py-3">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">

                        {{ csrf_field() }}
                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <div class="picture-container text-left">
                                    <div class="picture">
                                        <img id="avatar" src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}"
                                            class="picture-src" id="avatarPicturePreview" title="">
                                    </div>
                                </div>
                            </div>
                            <!-- The image Modal -->
                            <div id="imagemodal" class="imagemodal">

                                <!-- The Close Button -->
                                <span class="closeimage btn btn-danger"><b>&times;</b></span>

                                <!-- Modal Content (The Image) -->
                                <img class="imagemodal-content" id="img01">
                            </div>
                            <div class="col-sm-10 text-left">
                                <div class="row mt-2">
                                    <div class="col-sm-10 text-left">
                                        <strong><span>{{ $LoggedUserInfo['fname'] }}
                                                {{ $LoggedUserInfo['mname'] }}
                                                {{ $LoggedUserInfo['lname'] }}</span></strong><br>
                                        @if (!empty($LoggedUserInfo['barangay']) || !empty($LoggedUserInfo['city']) || !empty($LoggedUserInfo['province']))
                                            <span>{{ $LoggedUserInfo['barangay'] }}
                                                {{ $LoggedUserInfo['city'] }}
                                            </span><span>{{ $LoggedUserInfo['province'] }}
                                                {{ $LoggedUserInfo['postcode'] }}</span>
                                        @endif
                                        <br>
                                        <span>{{ $LoggedUserInfo['mob_num'] }}</span> [<a
                                            href="">{{ $LoggedUserInfo['email'] }}</a>]
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <a href="{{ route('u_update') }}"><i class="bi bi-pencil"
                                                style="color: red"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-8 text-left">
                                <h6>Educational BackGround</h6> <br>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('u_addEB') }}"><i class="bi bi-plus-lg"
                                        style="color: red"></i></a>
                            </div>
                            {{ csrf_field() }}
                            @foreach ($user_educbackInfo as $info)
                                <div class="col-md-3 text-left">
                                    <span class="text text-secondary">
                                        {{ $info->grade_date }}
                                    </span>
                                </div>
                                <div class="col-md-7 text-right">
                                    <div class="col-md-10 text-left">
                                        <strong><span>{{ $info->university }}</span></strong><br>
                                        <span>{{ $info->field }} <br>
                                            {{ $info->major }}</span><br>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <a href="user_EducBackedit/{{ Crypt::encrypt($info->id) }}"><i class="bi bi-pencil"
                                            style="color: red"></i></a>

                                </div>
                            @endforeach
                            {{ csrf_field() }}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-8 text-left">
                                <h6>Work Experience</h6> <br>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('u_updateWE') }}"><i class="bi bi-plus-lg"
                                        style="color: red"></i></a>
                            </div>

                            {{ csrf_field() }}
                            @foreach ($user_workexInfo as $info)
                                <input type="hidden" value="{{ $info->id }}">
                                <div class="col-md-3 text-left">
                                    <span class="text text-sm-left text-secondary">
                                        {{ $info->durationfrom }} - {{ $info->durationto }}
                                    </span>
                                </div>
                                <div class="col-md-7 text-left">
                                    <div class="col-md-10 text-left">
                                        <strong><span>{{ $info->postit }}</span></strong><br>
                                        <span>{{ $info->comname }} <br>
                                            {{ $info->specialization }}</span><br>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <a href="user_WorkExedit/{{ Crypt::encrypt($info->id) }}"><i class="bi bi-pencil"
                                            style="color: red"></i></a>
                                </div>
                            @endforeach

                            {{ csrf_field() }}
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-8 text-left">
                                <h6>Skills Information</h6> <br>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('u_updateSkills') }}"><i class="bi bi-plus-lg"
                                        style="color: red"></i></a>
                            </div>
                            @foreach ($user_SkilssInfo as $info)
                                <input type="hidden" value="{{ $info->id }}">
                                <div class="col-md-3 text-left">
                                    <span class="text text-sm-left text-secondary">
                                        {{ $info->proficiency }}
                                    </span>
                                </div>
                                <div class="col-md-7 text-left">
                                    <div class="col-md-10 text-left">
                                        <strong><span>{{ $info->skills }}</span></strong><br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <a href="user_Skillsedit/ {{ Crypt::encrypt($info->id) }} "><i class="bi bi-pencil"
                                            style="color: red"></i></a>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-6 text-left">
                                <h6>Attach document</h6> <br>
                            </div>
                            <div class="col-md-6 text-right">
                                <form action="{{ route('u_file_upload') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="userid" value="{{ $LoggedUserInfo['id'] }}">
                                    <div class="input-group input-group-sm mb-3">
                                        <input name="user_files" type="file" class="fileIn "
                                            accept=".doc,.pdf,.docx">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btnUp btn-danger rounded">Upload</button>
                                        </div>
                                        <span class="text-danger">@error('user_files'){{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12">
                                <table style="" class="table table-responsive-stack" id="tableOne">
                                    <thead>
                                        <tr>
                                            <th><a>Name</a></th>
                                            <th class="text-right"><a>Delete</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_files as $info)
                                            <tr>
                                                <td><i class="bi bi-file-earmark"></i><a
                                                        href="/u_view_file/{{ Crypt::encrypt($info->id) }}">{{ $info->file_path }}</a>
                                                </td>
                                                <td>
                                                    <a href="https://view.officeapps.live.com/op/view.aspx?src={{urlendoe($info->file_path)}}"
                                                    target="_blank" >view</a>
                                                </td>
                                                <td class="text-right">
                                                    <button type="button" data-id="{{ $info->id }}"
                                                        class="btn btn-white btn-view" data-toggle="modal"
                                                        data-target="#myModal"><i class="bi bi-trash"
                                                            style="color: red"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <form action="{{ route('u_file_delete') }}" method="post">
                            @csrf
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                                        </div>
                                        <div id="personDetails" class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-success">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event) {
                var button = $(event.relatedTarget);
                var personId = button.data("id");
                var id = "id"
                //displays values to modal
                $(this).find("#personDetails").html($("<input name=" + id + " hidden value=" + personId +
                    "></input> <b>Are you sure you want to delete this file?</b>"))
            }).on("hide.bs.modal", function(event) {
                $(this).find("#personDetails").html("");
            });
        });
    </script>
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/viewimage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script scrc="https://tryit.w3schools.com/code_datas.php"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
