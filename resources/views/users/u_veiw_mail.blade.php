<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Wi-Hire</title>
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/viewmail.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/mail.css">
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/mail.js"></script>
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
                                    <span class="text-secondary fw-bold">Mailbox</span>
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
                                                <div style="font-size: 12px" class="col-sm-12 text-end">
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
                        <a class="nav-link fw-bold" href="{{ route('jobs') }}">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('companies') }}">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('howto2') }}">How to Use</a>
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
                            <span class="text-secondary fw-bold">Mailbox</span>
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
                                        <div style="font-size: 12px" class="col-sm-12 text-end">
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
                        class="fw-bold nav-link text-light align-middle px-2">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_mail_inbox') }}"
                        class="fw-bold nav-link text-light align-middle px-2 bg-danger">
                        <div class="row">
                            <div class="col-8 text-start">
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
                    <a href="{{ route('u_sett') }}" class="fw-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_logout') }}" class="fw-bold nav-link text-light align-middle px-2">

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
                        class="fw-bold nav-link text-light align-middle px-2">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_mail_inbox') }}"
                        class="fw-bold nav-link text-light align-middle px-2 bg-danger">
                        <div class="row">
                            <div class="col-8 text-start">
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
                    <a href="{{ route('u_sett') }}" class="fw-bold  nav-link text-light align-middle px-2">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('u_logout') }}" class="fw-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                            Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="bg-light">
        </div>
    </div>


    <div id="main">
        <div class="container rounded bg-white " style="margin-bottom:2px">
            <br>
            <br>
            <div class="row">
                <div class="col-6 text-start">
                    <div class="btn-group rounded" role="group" aria-label="Second group">
                        <a href="{{ route('u_mail_inbox') }}"><button type="button"
                                class="gbot btn-danger text-light fw-bold rounded-left">
                                <i class="bot3 bi bi-inboxes"></i>
                                INBOX
                            </button></a>
                        <a href="{{ route('u_mail') }}">
                            <button type="button" class="gbot btn-danger text-light fw-bold rounded-right">
                                <i class="bot3 bi bi-card-checklist"></i>
                                SENT
                            </button>
                        </a>
                    </div>
                </div>
            </div><br>
        </div>
        <br>
        <div id="exTab2">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <div class="message-body">
                        <div class="sender-details">

                            <div class="row">
                                @if ($senderInfo->fname)
                                <div class="col-6 text-start text-danger">
                                    From:
                                    <img class="avatar rounded-circle border border-light " width="40px"
                                        src="/users/images/{{ $senderInfo['prof_pic'] }}"><strong
                                        class="align-middle px-0 ms-1 d-sm-inline"><b class="text-dark"> {{ $senderInfo['fname'] }}
                                            {{ $senderInfo['lname'] }}</b></strong>
                                </div><br>
                            @elseif($senderInfo->cname)
                                <div class="col-6 text-start text-danger">
                                    From:
                                    <img class="avatar rounded-circle border border-light " width="40px"
                                        src="/company/images/{{ $senderInfo['prof_pic'] }}"><strong
                                        class="align-middle px-0 ms-1 d-sm-inline">
                                        <b class="text-dark"> {{ $senderInfo['cname'] }}</b></strong>
                                </div><br>
                            @else
                                <div class="col-6 text-start text-danger">
                                    From:
                                    <img class="avatar rounded-circle border border-light " width="40px"
                                        src="/img/wihireicon.png"><strong
                                        class="align-middle px-0 ms-1 d-sm-inline">
                                        <b class="text-dark"> Admin</b></strong>
                                </div><br>
                            @endif
                            @if ($receiverinfo->fname)
                                <div class="col-6 text-start text-danger">
                                    To:
                                    <img class="avatar rounded-circle border border-light " width="40px"
                                        src="/users/images/{{ $receiverinfo['prof_pic'] }}"><strong
                                        class="align-middle px-0 ms-1 d-sm-inline"><b class="text-dark">
                                            {{ $receiverinfo['fname'] }}
                                            {{ $receiverinfo['lname'] }}</b></strong>
                                </div><br>
                            @elseif($receiverinfo->cname)
                                <div class="col-6 text-start text-danger">
                                    To:
                                    <img class="avatar rounded-circle border border-light " width="40px"
                                        src="/company/images/{{ $receiverinfo['prof_pic'] }}"><strong
                                        class="align-middle px-0 ms-1 d-sm-inline">
                                        <b class="text-dark"> {{ $receiverinfo['cname'] }}</b></strong>
                                </div><br>
                            @else
                            <div class="col-6 text-start text-danger">
                                To:
                                <img class="avatar rounded-circle border border-light " width="40px"
                                    src="/img/wihireicon.png"><strong
                                    class="align-middle px-0 ms-1 d-sm-inline">
                                    <b class="text-dark"> Admin</b></strong>
                            </div><br>
                            @endif
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 text-danger">
                                    Subject: <strong class="text-dark">{{ $mailInfo->subject }}</strong>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>
                                    &emsp;{{ $mailInfo->body }}
                                </p>
                            </div>
                        </div>
                        @if ($mailInfo->attach != null)
                            <i class="bi bi-file-earmark"></i><a class="text-decoration-none text-black"
                                href="">{{ $mailInfo->attach }}</a>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">

                    </div>
                    @if ($LoggedUserInfo->email == $mailInfo->to)
                        <div class="col-5 text-start">
                            <a class="text-decoration-none text-white" href="reply/ {{ Crypt::encrypt($mailInfo->id); }}"><button
                                    type="button" class="gbot btn-danger text-light fw-bold rounded">
                                    <i class="bot3 bi bi-reply-fill"></i>
                                    Reply
                                </button></a>
                        </div>
                    @endif
                    <div class="col-5 text-end">
                        @if ($receiverinfo['email'] == $LoggedUserInfo->email)
                            <a class="text-decoration-none text-white" href="{{ url()->previous() }}"><button
                                    type="button" class="gbot btn-danger text-light fw-bold rounded">
                                @else
                                    <a class="text-decoration-none text-white" href="{{ url()->previous() }}"><button
                                            type="button" class="gbot btn-danger text-light fw-bold rounded">
                        @endif
                        <i class="bot3 bi bi-backspace-fill"></i>
                        Back
                        </button></a>
                    </div>
                </div>
                <br>
            </div>
            <br>
        </div>

        <br>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
