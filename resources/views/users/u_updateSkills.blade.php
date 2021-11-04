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
    <link rel="stylesheet" type="text/css" href="/css/svg.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
</head>

<body style="background-color: rgb(223, 221, 221)">
    <!-- Navbar -->
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
                        class="font-weight-bold nav-link text-light align-middle px-2 ">
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
                        class="font-weight-bold nav-link text-light align-middle px-2 ">
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
                    <a href="{{ route('u_sett') }}" class="font-weight-bold  nav-link text-light align-middle px-2">

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

        <div class="d-flex flex-column align-items-center text-center p-4 py-5">
            <div class="row">
                <div class="card card-outline-secondary">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('u_profskillsupdate') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12 text-left font-weight-bold">
                                            <a class=" text-danger" href="{{ route('u_dash') }}">
                                                Profile
                                            </a>/
                                            <a>
                                               Edit Skills
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div class="p-3 py-5">
                                            <div class="text-left">
                                                <h4 class="">Skills Information</h4>
                                            </div>
                                            <hr>
                                            <!-- user id -->
                                            @if (Session::get('fail'))

                                                <div class="
                                                    alert alert-danger">
                                                    {{ Session::get('fail') }}
                                            </div>
                                            @endif
                                            <input type="hidden" name="user_id" value="{{ $LoggedUserInfo['id'] }}">
                                            <input type="hidden" name="data_id" value="{{ $LoggedUserInfo->id }}">

                                            <div class="row mt-2">
                                                <div class="col-md-6"><label
                                                        class="labels font-weight-bold">Skills</label><input
                                                        name="Skills" type="text" class="form-control"
                                                        value="{{ $info1->skills }}" placeholder="Skills"><span
                                                        class="text-danger">@error('grad_date'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels font-weight-bold">Proficiency
                                                    </label><input name="proficiency" id="browser" list="browsers"
                                                        value="{{ $info1->proficiency }}" class="form-control"
                                                        placeholder="Proficiency">
                                                    <datalist id="browsers">
                                                        <option value="Beginner">
                                                        <option value="Intermediate">
                                                        <option value="Advanced">
                                                    </datalist>
                                                    <span
                                                        class="text-danger">@error('qualification'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-8 text-left">
                                                        <button class="btn btn-success profile-button font-weight-bold"
                                                            type="submit"> <i class="bi bi-check-lg"></i> Update
                                                        </button>
                                                        <a href="{{ route('u_dash') }}"
                                                            class="btn btn-secondary text-white font-weight-bold">
                                                            <i class="bi bi-x-lg"></i>
                                                            Cancel
                                                        </a>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <a class="btn btn-danger text-white font-weight-bold"
                                                            type="button" data-target="#myModal" data-toggle="modal"><i
                                                                class="bi bi-trash"
                                                                style="color: rgb(255, 255, 255)"></i> Delete</a>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
                                                                <h4 class="modal-title">Warning!</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure to delete this Record? </p>
                                                            </div>
                                                            <div class="modal-footer" method="post">
                                                                <a data-dismiss="modal" class="btn bg-danger"
                                                                    type="button">No</a>
                                                                <a type="submit" class="btn bg-success"
                                                                    href="delete/{{ $info1->id }}">Yes</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Prepare the preview for profile picture
            $("#avatar-picture").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#avatarPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
