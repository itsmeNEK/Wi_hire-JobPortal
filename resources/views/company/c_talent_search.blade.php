<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/talent.css">
    <link rel="stylesheet" href="css/jobs.css">
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
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('companies') }}">Companies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('talent') }}">Talent Search</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('howto2') }}">How to Use</a>
                        </li>
                        @if (!empty($LoggedCompanyInfo['id']))
                            <div class="dropdown">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark font-weight-bold rounded"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/company/images/{{ $LoggedCompanyInfo['prof_pic'] }}">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                                aria-current="page">
                                                Dashboard</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_createjob') }}"><i
                                                class="bi bi-file-earmark-person"></i> <span aria-current="page">
                                                Create Job</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_manage') }}"><i class="bi bi-person-lines-fill"></i>
                                            <span aria-current="page">
                                                Manage Jobs</span></a>
                                        <a class="dropdown-item text-white font-weight-bold" href="#"><i
                                                class="bi bi-card-list"></i> <span aria-current="page">
                                                Applicants</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_mail_inbox') }}">
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
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_settings') }}"><i class="bi bi-sliders"></i> <span
                                                aria-current="page">
                                                Settings</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('c_logout') }}"><i class="bi bi-box-arrow-left"
                                                style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @elseif(!empty($adminLogged['id']))
                            <div class="dropdown">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark font-weight-bold rounded"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/img/wihireicon copy.png">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('a_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                                aria-current="page">
                                                Dashboard</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('a_mail_inbox') }}">
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
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('a_settings') }}"><i class="bi bi-sliders"></i> <span
                                                aria-current="page">
                                                Settings</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                            href="{{ route('a_logout') }}"><i class="bi bi-box-arrow-left"
                                                style=""></i>
                                            <span aria-current="page">
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
              border-radius:10px;
            -o-background-size: cover;
            background-size: cover !important;
            ">
            <div class="align-items-center">
                <form action="{{ route('talent') }}" method="GET">
                    <div class="search">
                        <div class="form-floating mb-3">
                            <input @if ($searchinfo == null)

                        @else
                            value="{{ $searchinfo['skm'] }}"
                            @endif
                            type="text" class="input form-control text-white" id="floatingInput"
                            name="skm" placeholder="Search by Job Name">
                            <label class="label" for="floatingInput"><i class="bi text-white bi-search"></i>
                                Skills / Field / Major </label>
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

        <div class="con text-center">
            <div>

                @forelse ( $user as $info )
                    <div class="content" id="content_{{ $info->id }}">
                        <div class="rounded bg-white c-container">
                            <div class="text-right">
                                <a id="{{ $info->id }}" onclick="hidecontent(this.id)" style="font-size: 20px"
                                    class="text-danger font-weight-bold"> <i class="bi bi-x-square-fill"></i></a>
                            </div>
                            <div class="content-detail">
                                <div class="card-thumbnail">
                                    <img src="/users/images/{{ $info->prof_pic }}" class="img-fluid" alt="">
                                </div>
                                <div class="job-details">
                                    <span class="text-md text-lg text-sm font-weight-bold text-secondary">
                                        <b class="text-black">{{ $info->fname }}
                                            {{ substr($info->mname, 0, 1) }} {{ $info->lname }}</span></b><br>

                                    </span><br>
                                    <span class="text-md text-lg text-sm">
                                        <b>Field of Study: </b> {{ $info->field }}
                                    </span>
                                    <br>
                                    <span class="text-md text-lg text-sm">
                                        <b>Major: </b>{{ $info->major }}
                                    </span>
                                    <br>
                                    <span class="text-md text-lg text-sm">
                                        <b>Specialization: </b>{{ $info->specialization }}
                                    </span>
                                    <br>
                                    <span class="text-md text-lg text-sm">
                                        <b>Gender: </b> {{ $info->gender }}
                                    </span>
                                    <br>
                                    <span class="text-md text-lg text-sm">
                                        <b>City: </b> {{ $info->city }}
                                    </span>
                                    <br>
                                    <span class="text-md text-lg text-sm">
                                        <b>Civil Status: </b> {{ $info->civilstat }}
                                    </span>
                                </div>
                            </div>
                            <div class="but text-right">
                                <a type="submit" href="View_Candidate/{{ Crypt::encrypt($info->id) }}"
                                    class="btn btn-danger text-white font-weight-bold">
                                    <i class="bi bi-arrow-bar-up"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="text-decoration-none text-black" onclick="showcontent(this.id)" id="{{ $info->id }}">
                        <div class="card-box-t">
                            <div class="card-thumbnail-t">
                                <img src="/users/images/{{ $info->prof_pic }}" class="img-fluid" alt="">
                            </div>
                            <span class="text-decoration-none text-black font-weight-bold">
                                {{ $info->fname }} {{ substr($info->mname, 0, 1) }} {{ $info->lname }}</span>
                            <h3 class="mt-2 text-danger"></h3>

                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->field }}
                            </span>
                            <br>

                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->major }}
                            </span>
                            <br>
                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->skills }}
                            </span>
                            <br>
                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->specialization }}
                            </span>
                            <br>
                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->gender }}
                            </span>
                            <br>
                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->city }}
                            </span>
                            <br>
                            <span class="text-md text-lg text-sm">
                                &#9679; {{ $info->civilstat }}
                            </span>
                            <br>
                        </div>
                    </a>
                @empty
                    <div class="row-mt-2" style="margin-top:10px;">
                        <div class="row-mt-2">
                            <div class="col-sm-12">
                                <div class="alert alert-dark text-lg-center " role="alert">
                                    <h1>No Candidate Found</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>

    </section>
    <br>
    <script src="/js/jobs.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
