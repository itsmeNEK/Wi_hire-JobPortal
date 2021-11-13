<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <title>@yield('title')</title>
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    @section('customCSS')
    @show
</head>

<body style="background-color: rgb(223, 221, 221)">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-toggler border-0 btn-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="d-flex align-items-center text-light text-decoration-none" aria-expanded="false">
                    <img class="avatar rounded-circle border border-light " width="40px"
                    src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                </span>
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
                        @if ($active != null || $appcountnew != null)
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
                                        <a aria-current="true" href="c_view_mail/{{ Crypt::encrypt($info->id) }}"
                                            class="nav-link text-dark bg-light">

                                            <div class="p-1 py-1">
                                                <b>
                                                    @if ($info->fname != null)
                                                        {{ $info->fname }}
                                                    @else
                                                        Admin
                                                    @endif
                                                </b> <br>
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
                        <div class="list-group bg-light">
                            @if ($appcountnew != null)
                                <div class="list-group-item list-group-item-action bg-light border-0">
                                    <span class="text-secondary fw-bold">Mailbox</span>
                                    @forelse ( $appcountnew_info as $info)
                                        <a aria-current="true" href="{{ route('c_appManage') }}"
                                            class="nav-link text-dark bg-light">
                                            <div class="p-1 py-1">
                                                <b>{{ $info->jobtit }}</b> <br>
                                                <div class="d-flex w-100 justify-content-between">
                                                    {{ $info->username }}
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
                        <a class="nav-link fw-bold" href="{{ route('talent') }}">Talent Search</a>
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
                @if ($active != null || $appcountnew != null)
                    <span class="position-absolute top-10 start-90 translate-middle p-2">
                        <i class="iActive bi text-danger bi-circle-fill"></i>
                    </span>
                @endif
            </a>
            <ul class="dropdown-menu bg-light" id="notif">
                <b class="ml-1">Notifications</b>
                @if ($active != null || $appcountnew != null)
                    <div class="list-group">
                        @if ($active != null)
                            <div class="list-group-item list-group-item-action bg-light border-0">
                                <span class="text-secondary fw-bold">Mailbox</span>
                                @forelse ( $inbox as $info)
                                    <a aria-current="true" href="c_view_mail/{{ Crypt::encrypt($info->id) }}"
                                        class="nav-link text-dark bg-light">
                                        <div class="p-1 py-1">
                                            <b>
                                                @if ($info->fname != null)
                                                    {{ $info->fname }}
                                                @else
                                                    Admin
                                                @endif
                                            </b> <br>
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
                    <div class="list-group bg-light">
                        @if ($appcountnew != null)
                            <div class="list-group-item list-group-item-action bg-light border-0">
                                <span class="text-secondary fw-bold">Mailbox</span>
                                @forelse ( $appcountnew_info as $info)
                                    <a aria-current="true" href="{{ route('c_appManage') }}"
                                        class="nav-link text-dark bg-light">
                                        <div class="p-1 py-1">
                                            <b>{{ $info->jobtit }}</b> <br>
                                            <div class="d-flex w-100 justify-content-between">
                                                {{ $info->username }}
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
                @else
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center fw-bold">
                        <span class="text-secondary fw-bold">No New Notifications</span>
                    </div>
                @endif
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
                    src="/company/images/{{ $LoggedUserInfo['prof_pic'] }}">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['cname'] }}</strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('c_dash') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('dash')">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_createjob') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('createjob')">
                        <i class="bi bi-file-earmark-person"></i> <span aria-current="page">
                            Create Job</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_manage') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('managejob')">
                        <i class="bi bi-person-lines-fill"></i> <span aria-current="page">
                            Manage Jobs</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-light align-middle px-2 @yield('applicant')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="row">
                            <div class="col-8 text-start">
                                <span class="bi bi-card-list" aria-current="page"> Applicants
                                    <i class="bi bi-caret-down-fill"></i>
                                </span>
                            </div>
                            @if ($appcountnew != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $appcountnew }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('new-app')"
                                href="{{ route('c_appManage') }}">
                                <div class="row">
                                    <div class="col-10 text-start">
                                        <span class="bi bi-person-plus-fill" aria-current="page"> New</span>
                                    </div>
                                    @if ($appcountnew != null)
                                        <div class="col-1 text-center">
                                            <span class="badge bg-none">{{ $appcountnew }}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('viewed-app')"
                                href="{{ route('c_appManageViewed') }}"><i class="bi bi-eye-fill"></i> Viewed
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('rej-app')"
                                href="{{ route('c_appManageRej') }}"><i class="bi bi-person-x-fill"></i> Rejected
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_mail_inbox') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('mail')">
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
                    <a href="{{ route('c_settings') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('settings')">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_logout') }}"
                        class="fw-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                            Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="bg-light">
        </div>
    </div>
    <div id="mySidebar" class="sidebar bg-dark">
        <div>
            <hr class="bg-light">
            <span class="d-flex align-items-center text-light text-decoration-none" aria-expanded="false">
                <img class="avatar rounded-circle border border-light " width="40px"
                    src="/company/images/{{ $LoggedUserInfo['prof_pic'] }}">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['cname'] }}</strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('c_dash') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('dash')">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_createjob') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('createjob')">
                        <i class="bi bi-file-earmark-person"></i> <span aria-current="page">
                            Create Job</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_manage') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('managejob')">
                        <i class="bi bi-person-lines-fill"></i> <span aria-current="page">
                            Manage Jobs</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('applicant')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="row">
                            <div class="col-8 text-start">
                                <span class="bi bi-card-list" aria-current="page"> Applicants
                                    <i class="bi bi-caret-down-fill"></i>
                                </span>
                            </div>
                            @if ($appcountnew != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $appcountnew }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('new-app')"
                                href="{{ route('c_appManage') }}"><i class="bi bi-person-plus-fill"></i> New
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('viewed-app')"
                                href="{{ route('c_appManageViewed') }}"><i class="bi bi-eye-fill"></i>Viewed
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('rej-app')"
                                href="{{ route('c_appManageRej') }}"><i class="bi bi-person-x-fill"></i>
                                Rejected
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_mail_inbox') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('mail')">
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
                    <a href="{{ route('c_settings') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('settings')">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('c_logout') }}"
                        class="fw-bold nav-link text-light align-middle px-2">

                        <i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                            Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="bg-light">
        </div>
    </div>
    @section('body')
    @show
    <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
        var s = document.createElement('script')
        s.src = "/js/sidebar.js";
        document.head.appendChild(s);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa" src="https://unpkg.com/@popperjs/core@2"></script>
    @section('customJS')
    @show
</body>

</html>
