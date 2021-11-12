<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @section('customCSS')

    @show

    <title>@yield('title')</title>
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
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
                        @if ($active != null || $comcountnew != null || $reportcount != null)
                            <span class="position-absolute top-10 start-90 translate-middle p-2">
                                <i class="iActive bi text-danger bi-circle-fill"></i>
                            </span>
                        @endif
                    </a>
                    <ul class="dropdown-menu bg-light" id="notif">
                        @if ($active != null || $comcountnew != null || $reportcount != null)
                            <b class="ml-1">Notifications</b>
                            <div class="list-group">
                                @if ($active != null)
                                    <div class="list-group-item list-group-item-action bg-light border-0">
                                        <span class="text-secondary fw-bold">Mailbox</span>
                                        @forelse ( $inbox as $info)
                                            <a aria-current="true" href="a_view_mail/{{ Crypt::encrypt($info->id) }}"
                                                class="nav-link text-dark bg-light">

                                                <div class="p-1 py-1">
                                                    <b>
                                                        @if ($info->fname != null)
                                                            {{ $info->fname }}
                                                        @elseif ($info->cname != null)
                                                            {{ $info->cname }}
                                                        @else
                                                            {{ $info->from }}
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
                            <div class="list-group">
                                @if ($comcountnew != null)
                                    <div class="list-group-item list-group-item-action bg-light border-0">
                                        <span class="text-secondary fw-bold">Companies</span>
                                        @forelse ( $comcountnew_info as $info)
                                            <a aria-current="true" href="View_Company/{{ Crypt::encrypt($info->id) }}"
                                                class="nav-link text-dark bg-light">
                                                <div class="p-1 py-1">
                                                    <b>{{ $info->cname }}</b> <br>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        {{ $info->cpname }}
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
                            <div class="list-group">
                                @if ($reportcount != null)
                                    <div class="list-group-item list-group-item-action bg-light border-0">
                                        <span class="text-secondary fw-bold">Website Issues</span>
                                        @forelse ( $reportcount_info as $info)
                                            <a aria-current="true"
                                                href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}"
                                                class="nav-link text-dark bg-light">

                                                <div class="p-1 py-1">
                                                    <b>{{ $info->subject }}</b> <br>
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
            </div>
        </div>
        <div class="btn-group dropstart">
            <a type="button" class="bell-full border-0 btn-lg bg-none" data-bs-toggle="dropdown" aria-expanded="false"
                data-bs-target="#notif" aria-controls="notif">
                <i class="bi bi-bell-fill text-light"></i>
                @if ($active != null || $comcountnew != null || $reportcount != null)
                    <span class="position-absolute top-10 start-90 translate-middle p-2">
                        <i class="iActive bi text-danger bi-circle-fill"></i>
                    </span>
                @endif
            </a>
            <ul class="dropdown-menu bg-light" id="notif">
                @if ($active != null || $comcountnew != null || $reportcount != null)
                    <b class="ml-1">Notifications</b>
                    <div class="list-group">
                        @if ($active != null)
                            <div class="list-group-item list-group-item-action bg-light border-0">
                                <span class="text-secondary fw-bold">Mailbox</span>
                                @forelse ( $inbox as $info)
                                    <a aria-current="true" href="a_view_mail/{{ Crypt::encrypt($info->id) }}"
                                        class="nav-link text-dark bg-light">

                                        <div class="p-1 py-1">
                                            <b>
                                                @if ($info->fname != null)
                                                    {{ $info->fname }}
                                                @elseif ($info->cname != null)
                                                    {{ $info->cname }}
                                                @else
                                                    {{ $info->from }}
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
                    <div class="list-group">
                        @if ($comcountnew != null)
                            <div class="list-group-item list-group-item-action bg-light border-0">
                                <span class="text-secondary fw-bold">Companies</span>
                                @forelse ( $comcountnew_info as $info)
                                    <a aria-current="true" href="/View_Company/{{ Crypt::encrypt($info->id) }}"
                                        class="nav-link text-dark bg-light">

                                        <div class="p-1 py-1">
                                            <b>{{ $info->cname }}</b> <br>
                                            <div class="d-flex w-100 justify-content-between">
                                                {{ $info->cpname }}
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
                    <div class="list-group">
                        @if ($reportcount != null)
                            <div class="list-group-item list-group-item-action bg-light border-0">
                                <span class="text-secondary fw-bold">Website Issues</span>
                                @forelse ( $reportcount_info as $info)
                                    <a aria-current="true" href="admin_Reports_view/{{ Crypt::encrypt($info->id) }}"
                                        class="nav-link text-dark bg-light">

                                        <div class="p-1 py-1">
                                            <b>{{ $info->subject }}</b> <br>
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
                <img class="avatar rounded-circle border border-light " width="40px" src="/img/wihireicon copy.png">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['adminName'] }}</strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('a_dash') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('dash')">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold  nav-link text-light align-middle px-2 @yield('candidates')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> <span aria-current="page">
                            Candidates <i class="bi-sm bi-caret-down-fill"></i></span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('can-active')"
                                href="{{ route('a_candidate') }}"><i class="bi bi-person-check-fill"></i> Active
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('can-blocked')"
                                href="{{ route('a_candidate_block') }}"><i class="bi bi-person-x-fill"></i> Blocked
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-light align-middle px-2 @yield('company')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="row">
                            <div class="col-10 text-start">
                                <span class="bi bi-card-list" aria-current="page"> Companies
                                    <i class="bi-sm bi-caret-down-fill"></i>
                                </span>
                            </div>
                            @if ($comcountnew != null)
                                <div class="col-1 text-center">
                                    <span class="badge bg-none">1</span>
                                </div>
                            @endif
                        </div>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('new-com')"
                                href="{{ route('a_companies') }}"><i class="bi bi-person-plus-fill"></i> New
                                @if ($comcountnew != null)
                                    <div class="col-1 text-center">
                                        <span class="badge bg-none">1</span>
                                    </div>
                                @endif
                            </a>

                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('app-com')"
                                href="{{ route('a_companies_approved') }}"><i class="bi bi-person-check-fill"></i>
                                Approve
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('block-com')"
                                href="{{ route('a_companies_blocked') }}"><i class="bi bi-person-x-fill"></i>
                                Blocked
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-light align-middle px-2 @yield('jobs')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-badge"></i> <span aria-current="page">
                            Jobs <i class="bi-sm bi-caret-down-fill"></i></span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('active-jobs')"
                                href="{{ route('a_jobs') }}"><i class="bi bi-person-plus-fill"></i> Active
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('inactive-jobs')"
                                href="{{ route('a_jobs_nactive') }}"><i class="bi bi-check"></i> Inactive
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_mail_inbox') }}"
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
                    <a href="{{ route('a_report') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('report')">
                        <div class="row">
                            <div class="col-8 text-start">
                                <i class="bi bi-bug-fill"></i> <span aria-current="page">
                                    Report
                                </span>
                            </div>
                            @if ($reportcount != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $reportcount }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_settings') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('settings')">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_logout') }}" class="fw-bold nav-link text-light align-middle px-2">

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
                <img class="avatar rounded-circle border border-light " width="40px" src="/img/wihireicon copy.png">
                <strong class="align-middle px-0 ms-1 d-sm-inline"><b> {{ $LoggedUserInfo['adminName'] }}</strong>
            </span>
            <hr class="bg-light">
            <ul style="padding-left:10px;" class="" id=" menu">
                <li class="nav-item">
                    <a href="{{ route('a_dash') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('dash')">
                        <i class="bi bi-speedometer2"></i> <span aria-current="page">
                            Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold  nav-link text-light align-middle px-2 @yield('candidates')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> <span aria-current="page">
                            Candidates <i class="bi-sm bi-caret-down-fill"></i></span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('can-active')"
                                href="{{ route('a_candidate') }}"><i class="bi bi-person-check-fill"></i> Active
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('can-blocked')"
                                href="{{ route('a_candidate_block') }}"><i class="bi bi-person-x-fill"></i> Blocked
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-light align-middle px-2 @yield('company')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="row">
                            <div class="col-8 text-start">
                                <span class="bi bi-card-list" aria-current="page"> Companies
                                    <i class="bi-sm bi-caret-down-fill"></i>
                                </span>
                            </div>
                            @if ($comcountnew != null)
                                <div class="col-1 text-center">
                                    <span class="badge bg-none">{{ $comcountnew }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('new-com')"
                                href="{{ route('a_companies') }}"><i class="bi bi-person-plus-fill"></i> New
                                @if ($comcountnew != null)
                                @endif
                            </a>

                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('app-com')"
                                href="{{ route('a_companies_approved') }}"><i class="bi bi-person-check-fill"></i>
                                Approve
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('block-com')"
                                href="{{ route('a_companies_blocked') }}"><i class="bi bi-person-x-fill"></i>
                                Blocked
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-light align-middle px-2 @yield('jobs')"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-badge"></i> <span aria-current="page">
                            Jobs <i class="bi-sm bi-caret-down-fill"></i></span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav-link text-white fw-bold @yield('active-jobs')"
                                href="{{ route('a_jobs') }}"><i class="bi bi-person-plus-fill"></i> Active
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-white fw-bold @yield('inactive-jobs')"
                                href="{{ route('a_jobs_nactive') }}"><i class="bi bi-check"></i> Inactive
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_mail_inbox') }}"
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
                    <a href="{{ route('a_report') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('report')">
                        <div class="row">
                            <div class="col-8 text-start">
                                <i class="bi bi-bug-fill"></i> <span aria-current="page">
                                    Report
                                </span>
                            </div>
                            @if ($reportcount != null)
                                <div class="col-2 text-center">
                                    <span class="badge bg-none">{{ $reportcount }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_settings') }}"
                        class="fw-bold nav-link text-light align-middle px-2 @yield('settings')">

                        <i class="bi bi-sliders"></i> <span aria-current="page">
                            Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a_logout') }}" class="fw-bold nav-link text-light align-middle px-2">

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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @section('customJS')

    @show
    <script src="/js/sidebar.js"></script>
</body>

</html>
