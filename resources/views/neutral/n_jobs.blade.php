<!DOCTYPE html>
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
    <link rel="stylesheet" href="/css/cdash.css">
    <link rel="stylesheet" href="/css/jobs.css">
    <link rel="stylesheet" href="/css/spin.css">
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Wi-Hire</title>
</head>

<body style="background-color: rgb(255, 255, 255)">
    <!-- header-->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/wihireicon copy.png" alt="..." height="30">
                    <b>WiHire</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @csrf
                <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (!empty($LoggedUserInfo['id']))
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('companies') }}">Companies</a>
                            </li>
                        @elseif (!empty($LoggedCompanyInfo['id']))
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('talent') }}">Talent Search</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('companies') }}">Companies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('talent') }}">Talent
                                    Search</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('howto2') }}">How to Use</a>
                        </li>
                        @if (empty($LoggedUserInfo['id']) && empty($LoggedCompanyInfo['id']) && empty($adminLogged['id']))
                            <li>
                                <a class="btn btn-outline-light rounded" type="button"
                                    href="{{ route('u_login') }}"><b>LOGIN</b></a>
                            </li>
                        @elseif(!empty($LoggedUserInfo['id']))
                            <div class="dropdown ">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark fw-bold" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white text-secondary fw-bold"
                                            href="{{ route('u_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                                aria-current="page">
                                                Profile</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('u_mail') }}">
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
                                        <a class="dropdown-item text-white text-secondary fw-bold"
                                            href="{{ route('u_sett') }}"><i class="bi bi-sliders"></i> <span
                                                aria-current="page">
                                                Settings</span></a>
                                        <a class="dropdown-item text-white text-secondary fw-bold"
                                            href="{{ route('u_logout') }}"><i class="bi bi-box-arrow-left"
                                                style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @elseif(!empty($LoggedCompanyInfo['id']))
                            <div class="dropdown">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark fw-bold rounded"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/company/images/{{ $LoggedCompanyInfo['prof_pic'] }}">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                                aria-current="page">
                                                Dashboard</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_createjob') }}"><i
                                                class="bi bi-file-earmark-person"></i> <span aria-current="page">
                                                Create Job</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_manage') }}"><i class="bi bi-person-lines-fill"></i>
                                            <span aria-current="page">
                                                Manage Jobs</span></a>
                                        <a class="dropdown-item text-white fw-bold" href="#"><i
                                                class="bi bi-card-list"></i> <span aria-current="page">
                                                Applicants</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_mail_inbox') }}">
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
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_settings') }}"><i class="bi bi-sliders"></i> <span
                                                aria-current="page">
                                                Settings</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_logout') }}"><i class="bi bi-box-arrow-left"
                                                style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @elseif(!empty($adminLogged['id']))
                            <div class="dropdown">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark fw-bold rounded"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/img/wihireicon copy.png">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('a_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                                aria-current="page">
                                                Dashboard</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('a_mail_inbox') }}">
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
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('a_settings') }}"><i class="bi bi-sliders"></i> <span
                                                aria-current="page">
                                                Settings</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('a_logout') }}"><i class="bi bi-box-arrow-left"
                                                style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!-- End Header -->
    <br>
    <!-- Background image -->
    <div class="p-4 py-2">
        <div class="p-5 text-center bg-image" style="
            background: linear-gradient(0deg,rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url('/img/header.jpg') no-repeat center center fixed !important;
              -webkit-background-size: cover;
         -moz-background-size: cover;
            -o-background-size: cover;
              border-radius:10px;
            background-size: cover !important;
            ">
            <div class="align-items-center">
                <form action="{{ route('jobs') }}" method="GET">
                    <div class="search">
                        <div class="form-floating mb-3">
                            <input @if ($searchinfo == null)

                        @else
                            value="{{ $searchinfo['jobname'] }}"
                            @endif
                            type="text" class="input form-control text-white" id="floatingInput"
                            name="jobname" placeholder="Search by Job Name">
                            <label class="label" for="floatingInput"><i class="bi text-white bi-search"></i>
                                Job Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input @if ($searchinfo == null)

                        @else
                            value="{{ $searchinfo['town'] }}"
                            @endif
                            type="text" class="input form-control text-white" id="floatingInput" name="town"
                            placeholder="Search by Job Name">
                            <label class="label" for="floatingInput"><i class="bi text-white bi-geo-alt"></i>
                                Area / Town</label>
                        </div>
                        <button class="btn btn-danger" type="submit"><b>Search</b></button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Background image -->

    {{-- jobs section --}}
    <br>
    <section>
        <div id="load"></div>
        <div id="contents">
            <div class="con text-center">
                <div class="text-center">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <h1 class="">Job Opportunities</h1>
                </div>
                <div>
                    @forelse($jobinfo as $info)

                        <div class="content " id="content_{{ $info->id }}">
                            <div class="rounded bg-white c-container" style="max-width: 700px;">
                                <div class="text-end">
                                    <a id="{{ $info->id }}" onclick="hidecontent(this.id)" style="font-size: 20px"
                                        class="text-danger fw-bold"> <i class="bi bi-x-square-fill"></i></a>
                                </div>
                                <div class="content-detail">
                                    <div class="card-thumbnail">
                                        <img src="/company/images/{{ $info['prof_pic'] }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="job-details">
                                        <h3 class="mt-2 text-danger"><b>{{ $info['jobtit'] }}</b></h3>
                                        <span class="text-md text-lg text-sm fw-bold text-secondary">
                                            <b class="text-black">Job Description: </b><br>
                                            &emsp;{{ $info->jobdes }}
                                        </span><br>
                                        <span class="text-md text-lg text-sm">
                                            <b>Speacialization: </b> {{ $info->special }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b>Experience: </b> {{ $info->exreq }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b>Salary Monthly: PHP </b>{{ $info->mimsal }} -
                                            {{ $info->maxsal }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b>Location: </b> {{ $info->city }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b>Type Of Role: </b> {{ $info->typerole }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a type="submit" href="/Jobs/Apply/{{ $info->id }}"
                                        class="btn btn-danger text-white fw-bold">
                                        <i class="bi bi-arrow-bar-up"></i> Apply
                                    </a>
                                </div>
                            </div>
                        </div>

                        <a class="text-decoration-none text-black" onclick="showcontent(this.id)"
                            id="{{ $info->id }}">
                            <div class="card-box">
                                <div class="card-thumbnail">
                                    <img src="/company/images/{{ $info['prof_pic'] }}" class="img-fluid" alt="">
                                </div>
                                <span class="text-decoration-none text-black fw-bold">
                                    {{ $info->cname }} </span>
                                <h3 class="mt-2 text-danger">{{ $info['jobtit'] }}</h3>
                                <span class="text-md text-lg text-sm">
                                    &#9679; PHP {{ $info->mimsal }} -
                                    {{ $info->maxsal }}
                                </span>
                                <br>
                                <span class="text-md text-lg text-sm">
                                    &#9679; {{ $info->city }}
                                </span>
                                <br>
                                <span class="text-md text-lg text-sm">
                                    &#9679; {{ $info->typerole }}
                                </span>
                                <div class="footer">
                                    {{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="row-mt-2" style="margin-top:10px;">
                            <div class="row-mt-2">
                                <div class="col-sm-12">
                                    <div class="alert alert-dark text-lg-center " role="alert">
                                        <h1>No Jobs Found</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <div class="row p-2 py-4">
                        <div class="col-12 text-center">
                            <span>
                                {{ $jobinfo->links('vendor.pagination.custom_pagination') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br>
    <script src="/js/jobs.js"></script>
    <script src="/js/spin.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script scrc="https://tryit.w3schools.com/code_datas.php"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
