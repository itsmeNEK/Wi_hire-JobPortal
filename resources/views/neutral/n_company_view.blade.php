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
    <link rel="stylesheet" href="/css/cdash.css">
    <link rel="stylesheet" href="/css/jobs.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/comview.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Wi-Hire</title>
</head>
<body style="background-color: rgb(223, 221, 221)">
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
                                <a class="nav-link font-weight-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('companies') }}">Companies</a>
                            </li>
                        @elseif (!empty($LoggedCompanyInfo['id']))
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('talent') }}">Talent Search</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('companies') }}">Companies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('talent') }}">Talent
                                    Search</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('howto2') }}">How to Use</a>
                        </li>
                        @if (empty($LoggedUserInfo['id']) && empty($LoggedCompanyInfo['id']) && empty($adminLogged['id']))
                        <li>
                            <a class="btn btn-outline-light rounded" type="button"
                                href="{{ route('u_login') }}"><b>LOGIN</b></a>
                        </li>
                        @elseif(!empty($LoggedUserInfo['id']))
                        <div class="dropdown ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-dark font-weight-bold"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="border border-dark" width="30px" type="button"
                                        src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right bg bg-dark"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-white text-secondary font-weight-bold"
                                        href="{{ route('u_dash') }}"><i class="bi bi-speedometer2"></i> <span aria-current="page">
                                            Profile</span></a>
                                        <a class="dropdown-item text-white font-weight-bold"
                                    href="{{ route('u_mail') }}">
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
                                    <a class="dropdown-item text-white text-secondary font-weight-bold"
                                        href="{{ route('u_sett') }}"><i class="bi bi-sliders"></i> <span aria-current="page">
                                            Settings</span></a>
                                    <a class="dropdown-item text-white text-secondary font-weight-bold"
                                        href="{{ route('u_logout') }}"><i class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                                            Logout</span></a>
                                </div>
                            </div>
                        </div>
                        @elseif(!empty($LoggedCompanyInfo['id']))
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
    <br>

<!-- Modal -->

@if (Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form
@if (session('LoggedUser'))
    action="{{ route('send_mail') }}"
    @elseif ((session('adminLogged')))
    action="{{ route('a_send_mail_com') }}"
@endif
method="post">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-dark" id="myModalLabel">
                        <div class="row">
                            <div class="col-12 text-left">
                                Message Company
                            </div>
                        </div>
                    </h4>
                </div>
                <div id="personDetails" class="modal-body text-dark">
                    <header class="header text-left font-weight-bold">
                        Please Fill All Inputs
                    </header>
                    <hr>
                    @if (session('LoggedUser'))
                    <input type="hidden" name="from" value="{{ $LoggedUserInfo['email'] }}">
                    <input type="hidden" name="to" value="{{ $companyinfo['email'] }}">
                    @endif
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="subject"
                            placeholder="Subject" value="{{ old('subject') }}">
                        <label for="floatingInput"><i class="bi text-danger bi-chat-square-quote-fill"></i>
                            Subject</label>
                        <span style="color: #fa695f;" class="text">@error('subject'){{ $message }}
                            @enderror</span>
                    </div>
                    <div class="form-floating mb-6">
                        <textarea style="height: 200px" value="{{ old('body') }}" placeholder="Message"
                            class="form-control" name="body" id="floatingTextarea2" cols="30" rows="10"></textarea>
                        <label for="floatingTextarea2"><i class="bi text-danger bi-paragraph"></i>
                            Body</label>
                        <span style="color: #fa695f;" class="text">@error('body'){{ $message }}
                            @enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <div id="main">
            <div class="container rounded bg-white container-outline">
                <br>
                <div class="row">
                    <div class="col-2 backbtn text-left font-weight-bold">
                        <a>
                            <button onclick="goBack()" type="button" class="btnUp btn btn-danger ">
                                <i class="bi bi-skip-backward-fill"></i>
                                Back
                            </button>
                        </a>
                    </div>
                    <div class="col-8 font-weight-bold tit">
                        <h2 class="text-center">Company Profile</h2>
                    </div>
                    <div class="col-2 text-right font-weight-bold">
                        <a>
                            @if ((session('LoggedUser')) || (session('adminLogged')))
                            <button data-toggle="modal" data-target="#myModal" type="button" class="btnUp btn btn-danger ">
                                <i class="bi bi-envelope-fill"></i>
                                Message
                            </button>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
            <br>
        <div class="container rounded bg-white p-4 py-4">
            <div class="contain text-center">
                <br>
                <br>
                <div class="details">
                    <div class="row" style="margin-top: -100px">
                        <div class="p-3 py-5 comdet">

                            @csrf
                            <div class="text-left">
                                <div class="col-sm-12">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img id="avatar" src="/company/images/{{ $companyinfo['prof_pic'] }}"
                                                class="picture-src" title="">
                                        </div>
                                    </div>
                                </div>
                                <!-- The image Modal -->
                                <div id="imagemodal" class="imagemodal p-3 py-5">

                                    <!-- The Close Button -->
                                    <span class="closeimage btn btn-danger"><b>&times;</b></span>

                                    <!-- Modal Content (The Image) -->
                                    <img class="imagemodal-content" id="img01">
                                </div>
                                <br>
                                <h3 class="text-left text-secondary">Company Information</h3>
                                <br>
                            </div>
                            <!-- user id -->
                            <h5>
                                <div class="content-detail text-lg text-left">
                                    <div class="job-details">
                                        <span class="text-md text-lg text-sm">
                                            <b class="text-black">Company Name: </b><br>&emsp;&emsp; {{ $companyinfo->cname }}
                                        </span><br>
                                        <span class="text-md text-lg text-sm">
                                            <b class="text-black">Contact Peson: </b><br>&emsp;&emsp; {{ $companyinfo->cpname }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b class="text-black">Email: </b><br>&emsp;&emsp; {{ $companyinfo->email }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b class="text-black">Address: </b><br>&emsp;&emsp; {{ $companyinfo->street }}
                                            {{ $companyinfo->barangay }}{{ $companyinfo->city }}
                                            {{ $companyinfo->province }}
                                        </span>
                                        <br>
                                        <span class="text-md text-lg text-sm">
                                            <b class="text-black">Company Description: </b>
                                            <br>&emsp;&emsp;{{ $companyinfo->cdescription }}
                                        </span>
                                        <br>
                                    </div>
                                </div>
                            </h5>
                        </div>



                        <div class="row-mt-2">
                            <div class="col-md-6 text-left">
                                <h3 class="text-left text-secondary">Attach document</h3>
                            </div>
                            <div class="col-sm-12">
                                <table style="" class="table table-responsive-stack" id="tableOne">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><a>Name</a></th>
                                            <th class="text-right"><a>View</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($companyfiles != null)
                                            @foreach ($companyfiles as $info)
                                                <tr>
                                                    <td class="text-left"><i
                                                            class="bi bi-file-earmark"></i><a>{{ $info->file_path }}</a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a target="_blank" href="/View_Company/{{ Crypt::encrypt($companyinfo['id']) }}/Viewfile/{{ Crypt::encrypt($info->id) }}" type="button"
                                                            class="btn btn-white btn-view"><i class="bi bi-eye-fill"
                                                                style="color: rgb(0, 0, 0)"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-left text-secondary">Jobs Posted</h3>
                        <br>
                       <div class="conc">
                        @forelse($jobinfo as $info)

                        <div class="content" id="content_{{ $info->id }}">
                            <div class="rounded bg-white c-container" style="max-width: 700px;">
                                <div class="text-right">
                                    <a id="{{ $info->id }}" onclick="hidecontent(this.id)"
                                        style="font-size: 20px" class="text-danger font-weight-bold"> <i
                                            class="bi bi-x-square-fill"></i></a>
                                </div>
                                <div class="content-detail">
                                    <div class="card-thumbnail">
                                        <img src="/company/images/{{ $info['prof_pic'] }}"
                                            class="img-fluid" alt="">
                                    </div>
                                    <div class="job-details">
                                        <span class="text-md text-lg text-sm font-weight-bold text-secondary">
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
                                @if (Session('LoggedUser'))
                                    <div class="text-right">
                                        <a type="submit"
                                            class="btn btn-danger text-white font-weight-bold">
                                            <i class="bi bi-arrow-bar-up"></i> Message
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <a type="button" class="text-decoration-none text-black" onclick="showcontent(this.id)"
                            id="{{ $info->id }}">
                            <div class="card-box">
                                <div class="card-thumbnail">
                                    <img src="/company/images/{{ $info['prof_pic'] }}" class="img-fluid"
                                        alt="">
                                </div>
                                <span class="text-decoration-none text-black font-weight-bold">
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
                       </div>
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
        </div>
        <br>
    </div>

    <br>
    <script>
        function goBack() {
          window.history.back();
        }
        </script>
    <script src="/js/jobs.js"></script>
    <script src="/js/viewimage.js"></script>
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
