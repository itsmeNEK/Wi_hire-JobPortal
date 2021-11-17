<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="/img/wihireicon copy.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Wi-Hire</title>
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/about.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
</head>

<body style="background-color: rgb(255, 255, 255)">
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="box-shadow: 0px 0px 10px 0px #c5c5c5;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/wihireicon copy.png" alt="..." height="30">
                    <b>WiHire</b></a>
                <button class="navbar-toggler" style="border:none;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (!empty($LoggedUserInfo['id']))
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('jobs') }}">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('companies') }}">Companies / Employer</a>
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
                                <a class="nav-link fw-bold" href="{{ route('companies') }}">Companies / Employer</a>
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
                            <div class="dropdown dropstart">
                                <button type="button" class="btn btn-dark fw-bold" data-bs-target="dropdown-menu"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="border border-dark" width="30px" type="button"
                                        src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right bg bg-dark"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-white text-secondary fw-bold"
                                        href="{{ route('u_dash') }}"><i class="bi bi-speedometer2"></i> <span
                                            aria-current="page">
                                            Profile</span></a>
                                    <a class="dropdown-item text-white fw-bold" href="{{ route('u_mail') }}">
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
                                        href="{{ route('u_logout') }}"><i class="bi bi-box-arrow-left" style=""></i>
                                        <span aria-current="page">
                                            Logout</span></a>
                                </div>
                            </div>
                        @elseif(!empty($LoggedCompanyInfo['id']))
                            <div class="dropdown dropstart">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark fw-bold rounded"
                                        data-bs-target="dropdown-menu" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/company/images/{{ $LoggedCompanyInfo['prof_pic'] }}">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white fw-bold" href="{{ route('c_dash') }}"><i
                                                class="bi bi-speedometer2"></i> <span aria-current="page">
                                                Dashboard</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_createjob') }}"><i
                                                class="bi bi-file-earmark-person"></i> <span aria-current="page">
                                                Create Job</span></a>
                                        <a class="dropdown-item text-white fw-bold" href="{{ route('c_manage') }}"><i
                                                class="bi bi-person-lines-fill"></i>
                                            <span aria-current="page">
                                                Manage Jobs</span></a>
                                        <a class="dropdown-item text-white fw-bold"
                                            href="{{ route('c_appManage') }}"><i class="bi bi-card-list"></i> <span
                                                aria-current="page">
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
                                        <a class="dropdown-item text-white fw-bold" href="{{ route('c_logout') }}"><i
                                                class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @elseif(!empty($adminLogged['id']))
                            <div class="dropdown dropstart">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark fw-bold rounded" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img class="border border-dark" width="30px" type="button"
                                            src="/img/wihireicon copy.png">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right bg bg-dark offset-10"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-white fw-bold" href="{{ route('a_dash') }}"><i
                                                class="bi bi-speedometer2"></i> <span aria-current="page">
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
                                        <a class="dropdown-item text-white fw-bold" href="{{ route('a_logout') }}"><i
                                                class="bi bi-box-arrow-left" style=""></i> <span aria-current="page">
                                                Logout</span></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navbar -->

    <div id="main">
        <div class="header-text text-center pt-4 p-5 py-5">
            <img src="/img/wihireicon.png" alt="">
            <br>
            <h1><strong><b>Our mission is to build the Portal for modern recruiting</b></strong></h1>
            <br>
            <h2><strong><b>We’re committed to building talent acquisition solutions that simplify workflows, automate
                        tasks, and give you the data you need to optimize your outreach, understand your pipeline, and
                        nurture relationships with top talent.</b></strong></h2>
        </div>
        <div>
            <div class="company-section text-center pt-4 p-5 py-5 fw-bold">
                <div class="card-box-a">
                    <div class="container">
                        <i class="bi bi-building"></i>
                    </div>
                    <h3 class="mt-2 text-danger fw-bold">Fit for small businesses</h3>
                    <span class="text-md text-lg text-sm ">
                        We aim for small businesses to grow with us by hiring local workers that fit there needs.
                    </span>
                </div>
                <div class="card-box-a">
                    <div class="container">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h3 class="mt-2 text-danger fw-bold"> Transparency </h3>
                    <span class="text-md text-lg text-sm">
                        Transparency by default, so everyone can make the best decisions.
                    </span>
                </div>
                <div class="card-box-a">
                    <div class="container">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h3 class="mt-2 text-danger fw-bold"> Velocity </h3>
                    <span class="text-md text-lg text-sm">
                        We move fast, we're scrappy, and we take calculated risks to keep up with the transforming
                        industry.
                    </span>
                </div>
                <div class="card-box-a">
                    <div class="container">
                        <i class="bi bi-bezier"></i>
                    </div>
                    <h3 class="mt-2 text-danger fw-bold"> Diversity </h3>
                    <span class="text-md text-lg text-sm">
                        Diverse perspectives lead to better outcomes. We value it in both our culture and Service.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-start text-white bg-dark">
        <!-- Grid container -->
        <div class="container p-2">
            <!-- Section: Social media -->
            <section class="mb-4">
                <div class="row">
                    <!-- Grid container -->
                    <div class="col-lg-8 col-md-8 col-sm-8 p-3 py-3">
                        <h2>Contact Us</h2>
                        <!-- Section: Social media -->
                        <section>
                            <!-- Facebook -->
                            <a class="btn btn-outline-light btn-floating m-1"
                                href="https://www.facebook.com/kenken.makulet/?viewas=100000686899395&show_switched_toast=0&show_switched_tooltip=0&show_podcast_settings=0"
                                role="button"><i class="fab fa-facebook-f"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/ItsKenBiiiitch"
                                role="button"><i class="fab fa-twitter"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                            <b>Or Mail Us @gmail </b>[ <a>wihire.job.portal@gmail.com</a> ]
                            <hr>
                            <span>
                                <a type="button" class="btn btn-outline-light fw-bold"
                                    href="{{ route('AboutUs') }}">
                                    <i class="bi bi-info"> About Us</i>
                                </a>
                            </span>
                        </section>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 p-3 py-3 text-end">
                        <h3 class="mb-3">Page Mail</h3>
                        <!-- Button trigger modal -->
                        <a type="button" class="btn btn-outline-light btn-floating mb-sm-1" data-bs-toggle="modal"
                            href="#" data-bs-target="#myModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg> Mail Us
                        </a>

                        <br>
                        <hr>
                        <a class="btn btn-outline-light btn-floating m-1" href="{{ route('Report') }}"><i
                                class="fab fa-github"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bug-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z" />
                                <path
                                    d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z" />
                            </svg> Report Website Issue
                        </a>
                    </div>
                </div>


                <!-- Modal -->

                <form action="{{ route('mail_us') }}" method="post">
                    @csrf
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-dark" id="myModalLabel">
                                        <div class="row">
                                            <div class="col-12 text-start">
                                                Mail Us
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                                <div id="personDetails" class="modal-body text-dark">
                                    <header class="header text-start fw-bold">
                                        Please Fill All Inputs
                                    </header>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    name="name" placeholder="Name" value="{{ old('name') }}">
                                                <label for="floatingInput"><i
                                                        class="bi text-danger bi-person-lines-fill"></i>
                                                    Name</label>
                                                <span style="color: #fa695f;"
                                                    class="text">@error('name'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>

                                        <div class="col-6 text-end">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    name="email" placeholder="name@example.com">
                                                <label for="floatingInput"><i
                                                        class="bi text-danger bi-envelope-fill"></i> Email
                                                    address</label>
                                                <span style="color: #fa695f;"
                                                    class="text">@error('email'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="subject"
                                            placeholder="Subject" value="{{ old('subject') }}">
                                        <label for="floatingInput"><i
                                                class="bi text-danger bi-chat-square-quote-fill"></i>
                                            Subject</label>
                                        <span style="color: #fa695f;"
                                            class="text">@error('subject'){{ $message }}
                                            @enderror</span>
                                    </div>
                                    <div class="form-floating mb-6">
                                        <textarea style="height: 200px" value="{{ old('body') }}"
                                            placeholder="Message" class="form-control" name="body"
                                            id="floatingTextarea2" cols="30" rows="10"></textarea>
                                        <label for="floatingTextarea2"><i class="bi text-danger bi-paragraph"></i>
                                            Body</label>
                                        <span style="color: #fa695f;"
                                            class="text">@error('body'){{ $message }}
                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-6 text-end">
                                            <button type="submit" class="btn btn-danger">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa" src="https://unpkg.com/@popperjs/core@2"></script>
</body>

</html>
